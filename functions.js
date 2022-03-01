$(document).ready(function() {
	init();
	pdfEditor.init();
	//$("#modaluploadfile").modal("show");



	function init(){
		$('.mainmenu li').click(function (e) {
			var name = $(this).find('a').attr('name');
			switch(name){
				case "uploadfile": pdfEditor.Menu.showModalUpload(); break;
			}
		});
		$("#uploadfile").click(function (e) {
			e.preventDefault();
			pdfEditor.DropZone.upolodaFile();
		});
	}
	/*
	function getPDF(){
		$.post('http://localhost/pdfonlineeditor/xmlOut/Profile.pdf/Profile.pdf.xml', {}, function(data, textStatus, xhr) {
			var doc = $(data);
			var fonts = {};
			$.each(doc.find("page"), function(i, d) {
				var page = $(d)
				//var fonts = getFonts(page);
				fonts = Object.assign(fonts,getFonts(page));
				//----Page Render---
				var html = $("<div class='page'></div>");
				html.css(getAttr(d));

				$.each(page.find("text"), function(iText, vText) {
					var f = $(vText).attr("font");
					var tx = $("<div class='text' contenteditable='true'>"+$(vText).text()+"</div>");
					tx.css(getAttr(vText));
					if(fonts["font-"+f] != undefined) {
						tx.css(fonts["font-"+f]);
					}
					html.append(tx);
				});
				$("#docContainer").append(html);
				console.log(i,d)
			});

		});
	}
	function getAttr(d){
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
	}
	function getFonts(page){
		var fonts = {};
		$.each(page.find("fontspec"), function(i, v) {
			 var attr = getAttr(v);
			 if(attr.id != undefined){
			 	fonts["font-"+attr.id] = attr
			 }

		});
		return fonts;
	}*/

});