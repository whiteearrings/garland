arrayOfOptions = ["pallal","prafulla","rash"];
$('#searchinput').ready(function() {
	$("#searchinput").autocomplete({source: arrayOfOptions});//, messages: {
      //  noResults: '',
       // results: function() {}
    //}});
});