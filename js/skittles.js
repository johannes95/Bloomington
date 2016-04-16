$(document).ready(function(){
	$("#canvas").width($("#img").width());
	$("#canvas").height($("#img").height());
	console.log($("#img").width());

	//console.log($("#img").width()+" "+$("#canvas").width());

	//create image
	var canvas=document.getElementById("canvas");
	var ctx=canvas.getContext("2d");
	var img=document.getElementById("img");
	ctx.drawImage(img,0,0);
	var imgData=ctx.getImageData(0,0,$("#img").width(), $("#img").height());
	//console.log(c.width+" "+c.height);

	// invert colors
	for (var i=0;i<imgData.data.length;i+=4)
	  {
	  imgData.data[i]=255-imgData.data[i];
	  imgData.data[i+1]=255-imgData.data[i+1];
	  imgData.data[i+2]=255-imgData.data[i+2];
	  imgData.data[i+3]=255;
	  }
	ctx.putImageData(imgData,0,0);


});