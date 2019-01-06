$(function(){
	var _hei = $(window).height();
	$(".banner .swiper-slide").css({"height":_hei+"px"});
	$(".banner,.mask").css({"height":_hei+"px"});
	

	var wow = new WOW({
             boxClass:     'wow',      // default
             animateClass: 'animated', // default
             offset:       150,          // default
             mobile:       true,       // default
             live:         true        // default
	    })
		wow.init();
		var swiper = new Swiper('.banner>.swiper-container', {
		      centeredSlides: true,
		      loop:true,
		      autoplay: {
		        delay: 5000,
		        disableOnInteraction: false,
		      },
		      navigation: {
		        nextEl: '.swiper-button-next',
		        prevEl: '.swiper-button-prev',
		      },
		      on:{
			      init: function(){
			        swiperAnimateCache(this); //隐藏动画元素 
			        swiperAnimate(this); //初始化完成开始动画
			   }, 
			      slideChangeTransitionEnd: function(){ 
			        swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
			      } 
    		   }
    	});
    	var swiper1 = new Swiper('.success-case .swiper-container', {
		      centeredSlides: true,
		      pagination: {
		        el: '.swiper-pagination',
		        clickable: true,
		      },
		      navigation: {
		        nextEl: '.swiper-button-next',
		        prevEl: '.swiper-button-prev',
		      },
		      on:{
			      init: function(){
			        swiperAnimateCache(this); //隐藏动画元素 
			        swiperAnimate(this); //初始化完成开始动画
			   }, 
			      slideChangeTransitionEnd: function(){ 
			        swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
			      } 
    		   }
    	});
// $(".advisory-btn").on("click",function(){
// 	$(".yy-sucessBox").show();
// 	setTimeout(function(){
// 		$(".yy-sucessBox").hide();
// 	},1500);
// });

	

	

});

// 公共提示方法
function tishi(xuanding, msg){
	xuanding.siblings(".error-txt").html(msg);
	xuanding.siblings(".error-txt").show();

	xuanding.siblings(".error-icon").show();
}

// 去掉提示
function qutishi(xuanding){
	xuanding.siblings(".error-txt").html('');
	xuanding.siblings(".error-txt").hide();
	
	xuanding.siblings(".error-icon").hide();
}

// 点击立即预约执行
function yuyue(usertype){
	var nickname_input = $("input[name='nickname']");
	var phone_input = $("input[name='phone']");
	var company_input = $("input[name='company']");

	// 清空提示重新判断
	qutishi(nickname_input);
	qutishi(phone_input);
	qutishi(company_input);

	var nickname = nickname_input.val();
	var phone = phone_input.val();
	var company = company_input.val();

	var issubmit = true;
	if(nickname == ''){
		issubmit = false;
		// alert('昵称空');
		tishi(nickname_input,'不能为空');
	}
	if(phone == ''){
		issubmit = false;
		// alert('电话空');
		tishi(phone_input,'不能为空');
	}else{
		if(!(/^[1][3,4,5,7,8][0-9]{9}$/).test(phone)){
			issubmit = false;
			// alert('手机号格式错误');
			tishi(phone_input,'格式不对');
		}
	}
	if(company == ''){
		issubmit = false;
		// alert('公司空');
		tishi(company_input,'不能为空');
	}	
	

	if(!issubmit){
		return false;
	}
	var sendData = "type="+usertype+"&nickname="+nickname+"&phone="+phone+"&company="+company;

	$.ajax({
		url:"./reservation.php",
		data:sendData,
		dataType:"json",
		success:function(data){
			

			$(".sucessBox-txt").html(data.msg);
			$(".yy-sucessBox").show();

			setTimeout(function(){
				$(".yy-sucessBox").hide();
			},1500);
		},
		error:function(){

		}

	})
}

function testjack(canshu){
	alert(canshu);
}