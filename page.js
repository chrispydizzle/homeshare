$(document).ready(function () {
	$('.logo').click(function () {
		window.location = "http://www.cpsharp.net";
	});

	setTimeout("$('.glitz').removeClass('glitz_hide');", 500);
	var blocks = [];
	var cube_container = $('section');
	blocks["S1"] = new menu("S1");
	blocks["S2"] = new menu("S2");

	function hide_all_blocks(){
		for(var e in blocks){
			blocks[e].should_hide = true;
			blocks[e].hide_me();
		};
		cube_container.css('top', '50%');
	}

	function menu(block) {
		this.ident = "#" + block;
		this.should_hide = false;
		this.domobject = $(this.ident);

		this.hide_me = function () {
			var list_id = this.ident + "_list";

			if (this.should_hide) {
				$(list_id).removeClass('be_seen');
			}
		};


		this.show_me = function () {
			var list_id = this.ident + "_list";
			hide_all_blocks();
			cube_container.css('top', '80%');
			$(list_id).addClass('be_seen');
			this.should_hide = false;
		};

		this.domobject.children("div").hover(function () {
			blocks[this.parentElement.id].show_me();
		}, function () {
			blocks[this.parentElement.id].hide_me();
		});
	}
});