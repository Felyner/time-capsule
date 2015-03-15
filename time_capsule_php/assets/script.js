
var count = 1;

function add_item(){
	var dom = $("#items");
	var item = $("#item");
	var new_item = $(item.html());
	var name = "capsule_item[".concat(count).concat("]");

	new_item.attr('name', name);
	new_item.css("visibility", "visible");	
	
	
	dom.append(new_item);
	count = count + 1;
}