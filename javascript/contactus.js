function validateForm()
{
	var x=document.forms["feedbackform"]["empname"].value;
	if (x==null || x=="")
 	 {
  		alert("Please enter name");
  		return false;
  	 }
  	
  	var z = document.forms["feedbackform"]["empmail"].value;
  	var atpos=z.indexOf("@");
	var dotpos=z.lastIndexOf(".");
	if (atpos < 1 || dotpos < atpos+2 || dotpos+2 >= z.length)
  	{
  		alert("Please enter a valid e-mail address");
  		return false;
  	}

  	var y = document.forms["feedbackform"]["reason"].value;
  	if (y == null || y == "")
  	{
  		alert("Please enter feedback");
  		return false;
  	}

  	return true;
}