$(function() {
	var li_index, li_next_index, li_prev_index;
	var ul_order = [ 0, 1, 3, 2];
	var ul_order_index = 0;
	var time;
	
	// var target = 2;
	


	
	$('.start-btn').click(function() {
		var target = Math.ceil( Math.random() * ( $(".FruitBar li").length - 1 ) );

		console.log('target='+target);
		
		time = 8000;
		li_index = $('.merry ul li.active').attr("number");
		// console.log('li_index = '+li_index);	

		// run(target)

		while(time > 10) {

			// var aa = setTimeout(run, time);
			if(time > 70) {
				var aa = setTimeout(
					function() {
						run(target);
				}, time);
			}else {
				var aa = setTimeout(
					function() {
						run(target);
				}, time);
			}

			

			time = time / 1.11;
			
			// console.log('time = '+ time);
			li_index++;
			// console.log('li_index2 = '+ li_index);
			if(time <= 10) {
				goToTarget();
			}

		}

		function goToTarget() {
			var step = li_index % 12;
			var addStep = step - target > 0 ? (11 - step + target + 1) : (target - step)
			// console.log('li_index3 = '+ li_index);
			for(var i = 0; i < addStep; i++) {
				var aa = setTimeout(
					function() {
						run(target);
				}, time);
				// console.log('i = '+i);
				// console.log('time = '+ time);
			}
			// console.log('step = '+ step);
			// console.log('addStep = '+addStep);
			// console.log('goToTarget');
			// console.log('number='+$('ul').eq(ul_order[ul_order_index]).find('li').eq(li_next_index).attr("number"));
			// console.log('target='+target);
		}
		// while(time <= 10) {

		// 	// var aa = setTimeout(run, time);
		// 	var aa = setTimeout(
		// 		function() {
		// 			run(target);
		// 	}, time);
		// }



		function run(target) {

			// li_index = $('ul li.active').index();

			if( ul_order[ul_order_index]  == 0 || ul_order[ul_order_index]  == 1 ) {
				next();	
			}else {
				prev();
			}

			function next() {
				li_next_index = $('.merry ul li.active').next().index();
				go();
			}

			function prev() {
				li_next_index = $('.merry ul li.active').prev().index();
				go();
			}

			function go() {
				// 判斷是不是跑到最後一個li
				if( li_next_index >= 0 ) {

					$('.merry ul').eq(ul_order[ul_order_index]).find('li').removeClass().eq(li_next_index).addClass("active");
				
				}else {

					change_ul();
				
				}
			}

			function change_ul() {
				$('.merry ul>li.active').removeClass();
				ul_order_index++;
				if(ul_order_index > ul_order.length - 1) {
					ul_order_index = 0;
				}
				if( ul_order[ul_order_index]  == 0 || ul_order[ul_order_index]  == 1 ) {
					$('.merry ul').eq(ul_order[ul_order_index]).find('li').first().addClass("active");
					li_next_index = 0;
				}else {
					$('.merry ul').eq(ul_order[ul_order_index]).find('li').last().addClass("active");
					li_next_index = $('ul').eq(ul_order[ul_order_index]).find('li').length - 1;
				}
			}

			

			// $('.FruitBar li').each(function(i) {

				// if( $('ul').eq(ul_order[ul_order_index]).find('li').eq(li_next_index).hasClass("active") ){
				// 	if( $('ul').eq(ul_order[ul_order_index]).find('li').eq(li_next_index).attr("number") == target ) {
				// 		// alert(target);
				// 		console.log(target);
				// 		// clearTimeout(aa);
				// 	}else {
						
				// 		// var aa = setTimeout(run(target), time);
						
				// 		console.log('aa');
				// 	}
				// }
			// });

			// console.log('number='+$('ul').eq(ul_order[ul_order_index]).find('li').eq(li_next_index).attr("number"));
			// console.log('target='+target);
			// time = 1000;


			

			// for( var i = 0; i < $('ul').length; i++) {
			// 	if($('ul').eq(i).has($('li.active')).length > 0) {
			// 		console.log(i);
			// 	}
			// }
		}
		
	});

	
});