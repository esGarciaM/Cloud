var pdfEditor = {
	init:function(dzname){
		if (dzname == undefined) dzname = '.dropzone';
		pdfEditor.DropZone.control = $(dzname);
		pdfEditor.DropZone.control.append('<form class="dzForm"><input type="file" name="pdfFile" accept="application/pdf"></form>');
		/*pdfEditor.DropZone.control.css({
			position: 'relative'
		});*/
		pdfEditor.DropZone.inputFiles = $('.dropzone input[type="file"]');
		pdfEditor.DropZone.inputFiles.on('change', function(event) {
			pdfEditor.DropZone.empty();
			pdfEditor.Files = this;
			if(pdfEditor.Files.files.length < 1) return;
			var file = pdfEditor.Files.files[0];
			var dz = pdfEditor.DropZone.inputFiles.parents(".dropzone");
			dz.append('<div class="dzIconFile"><div><li class="fa fa-file fa-2xl"></li></div><br><div class="filename">'+file.name.substring(0,7)+'...</div><div>')
		});

		$("#modaluploadfile").on('hide.bs.modal', function(event) {
			pdfEditor.DropZone.empty();
		});
	},
	Menu:{
		showModalUpload:function(){
			//Modal must be inserted via javascript to get full functionality
			$("#modaluploadfile").modal("show");
		}
	},
	DropZone:{
		control:null,
		inputFiles:null,
		Files:null,
		empty:function(){
			$(".dzIconFile").remove();
		},
		upolodaFile:function() {
			var formData = new FormData($(".dropzone .dzForm")[0]);
			formData.append("op","updloadPdfFile");
			$.ajax({
				url: 'process.php',
				type: 'POST',
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				//beforeSend: function(){},
				success: function(xmlFile){
					console.log(xmlFile);
					pdfEditor.getPDF(xmlFile);
				},
				complete:function(){
					$(".modal").modal("hide");
				},
				error: function(e){}
			});
		}
	},
	getPDF:function(url){
		$.post(url, {}, function(data, textStatus, xhr) {
			var doc = $(data);
			var fonts = {};
			$("#docContainer").empty();
			$.each(doc.find("page"), function(i, d) {
				var page = $(d)
				//var fonts = getFonts(page);
				fonts = Object.assign(fonts,pdfEditor.getFonts(page));
				//----Page Render---
				var html = $("<div class='page'></div>");
				html.css(pdfEditor.getAttr(d));

				$.each(page.find("text"), function(iText, vText) {
					var f = $(vText).attr("font");
					var tx = $("<div class='text' contenteditable='true'>"+$(vText).text()+"</div>");
					tx.css(pdfEditor.getAttr(vText));
					if(fonts["font-"+f] != undefined) {
						tx.css(fonts["font-"+f]);
					}
					html.append(tx);
				});
				$("#docContainer").append(html);
				console.log(i,d)
			});

		});
	},
	getAttr:function(d){
		var css = {}
		//var a = ["position"];
		var a = ["top","left","width","height","size"];
		$.each(d.attributes, function(n, v) {
			if($.inArray(v.name, a) != -1) {
				var attr = v.name;
				if(attr == "size") attr = "font-size";
				css[attr]=v.value+"px";
			}
			else{
				if (v.name != "position") css[v.name]=v.value;
			}
		});
		return css;
	},
	getFonts:function(page){
		var fonts = {};
		$.each(page.find("fontspec"), function(i, v) {
			 var attr = pdfEditor.getAttr(v);
			 if(attr.id != undefined){
			 	fonts["font-"+attr.id] = attr
			 }

		});
		return fonts;
	}
}