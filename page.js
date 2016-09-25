$(document).ready(function () {
	$('.logo').click(function () {
		window.location = "http://www.cpsharp.net";
	});

	$('.downloadnot').click(function(trigger_button)
	{
		var file_path = trigger_button.target.attributes['file'].value;
//		$.post('fs.php', { filename: file_path});

	});

	// setTimeout("$('.glitz').removeClass('glitz_hide');", 500);
	var blocks = [];
	var cube_container = $('section');
	blocks["S1"] = new BlockMenu("S1");
	blocks["S2"] = new BlockMenu("S2");
	blocks["Movies"] = new BlockMenu("Movies");

	function hide_all_blocks() {
		for (var e in blocks) {
			blocks[e].should_hide = true;
			blocks[e].hide_me();
		}

		cube_container.css('top', '50%');
	}

	function BlockMenu($block) {
		this.ident = "#" + $block;
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
	}});