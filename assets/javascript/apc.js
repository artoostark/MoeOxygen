(function ($, doc) {
	$(doc).ready(function () {
		/**
		 * 站点导航栏
		 * @type {NodeListOf<Element>}
		 */
		var aLi = document.querySelectorAll(".site-nav-ul li");
		for (var i = 0; aLi.length > i; i++) {
			aLi[i].i = i;
			aLi[i].onmouseover = function () {
				this.className = "liname";
				this.querySelector(".site-nav-list") !== null ? this.querySelector(".site-nav-list").style.top = -44 + 'px' : '';
				this.querySelector(".sub-menu") !== null ? this.querySelector(".sub-menu").style.top = -44 + 'px' : '';
			};
			aLi[i].onmouseout = function () {
				this.className = "";
			}
		}
		/**
		 * 轮播图配置
		 */
		if (doc.querySelector("#thumbnail") !== null && doc.querySelector("#thumbnail") !== undefined) {
			$('#thumbnail').terseBanner({
				btn: false,
				arrow: true,
				thumbWidth: 110
			});
			$("main .apc-main .site-slider .tb-arrow .prev img")[0].src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAtCAYAAAAk09IpAAAD9klEQVRYhbWY3XMURRTFf73fcSUhiaUhFFIIFRFL8Ul4wX/eV3iAQvwogigaCZtgIpAN2ck2D6c76Z3t3plek1M1VbMz3bfP3L733NtrmB8GWHD3BXA0jxFr7cl9a475HWAD+NQRGrurAA6B34HX8xDLJdMDbgGXgEZizCLwE/Aql0zKYApXKogAfAzcAPrnSaYNLNWcswysnieZJvW3tYHInxuZ98AoY3zOWCCPjAW2ay7yFtg/KzIm8XwLeFZhcwT8BrzJJVNetIn2ehllRQMYArvAu2DMKnANaY3HMfAP8Dewg7SnEqHohWR6wJcofcPn1hneR/qx59533NXiVPyGKLZqI0amB9xBgpWch1T2IfDS/a5CF3m558geIHU+8VqsHNwCLlQYNmgLb6N4eDtj7BJwk8lt9CiAP1BcFeELH8DLpIO2jDawRjr4vwDuJYiAHHAd+IGSSueWA49+Yu4G8DX1PqwP3DXGdMpkcst/wXTMrKEEyMFHwDdlMpvkKeYWk6nbAr7NJOKxboxZCslsoaAaUZ0lT5hW16soc2bh2K3zI/AgMn+i8P2MxO0GcBGJW4g3wC/AgEmvGBS0KViUzpuonMC0Fq0bYx6Vq/Ard/UcoZb7on3ktViseB2JYehI/MVkGJSDvw30Ui3BIRI20JfP2rrPIs8K4IUjMoy8j5WKTp3+pCqGYqp9H21nls3cqh1DrL2sKpJRMmXPNFFZuAp8gmLBopqyAzxnugy8jxC6iar808j4FNkizJi2M3Ib1ZY28lADpe0ScNn9Do8iiyiIQ3Tdgpfd/QGTdaiJsjbEU0+m5YhcizD2MG7cIsqwPfe84RYtj11wizaROreQPPgt2ijN+dXHTL+CSIiOG+vjakCp+gZoo0ZsAVgHvkfZFwv6cQN92UpNIuEivuUYA39WjO87Ul3kke9K73ettdZ7pk6jFMIymXGb1GszLyAxLfdOL0BeGQP/1TTmccRpTwwSyc2M+SGGqG8+qT8Fcv0i1RozQr1wuft/jeRgYWpGGhZ4YK19F5IZA/+iPfUujJE6QD3wgOmttaiE+ICtg8fW2i3/I7bgRSR6yyhzCiRcL1HVPYoQCWFQk3WdtMIfAo+A7dRRJWXYX/7IUhddpD8r7t4r+QCdr8aQPjfNgxW0rQZ5bM8tWFXpT/B//rnyi6whOe9yeog7RpkxQDUs6zDnjefiCvAVs9vM56grrOyrQ8/kHlVW0IGvqt/9HMl/FnLJrKIMq2M3t8Rk/3OV6nXPBDlkjql/trLM8f9M7jbtIsGqwg46I507mSfM9tC2G3OQS2ae1G6g/qSPalAPxdMI6cxODpGzVGDfnHnRyykXU2Q+AMkrAZ9M6/tVAAAAAElFTkSuQmCC";
			$("main .apc-main .site-slider .tb-arrow .next img")[0].src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAtCAYAAAAk09IpAAAD70lEQVRYhbWY7W8UNxDGf3u3d1wugdCUEKClvJSWCtQCn+gH/n8JRCtVaoEgIEpTQpNCEnKQXHLJuR9mnPVt7F17SR5pdevbWfvx7MzjsTNOBl0g1/tdwMS+aExhmlfY1WEOuAH0tJ+WXgZYB14C+ykdZg2JXATuAjOB52PgHfAMGFZ15Hqm1YDINHCrgojt9zJwNaXjJmS+Br6K7HsW6JwmmU7CeznQPk0yo0TbvVjjJmQ+Ap8iiayRkOZNyAyQtK3z0BtgNfDMm8VNU7sFXAC+QbLGjYt1YAn4ABzqf9NI4E8haf8J2ARGxhhr05iMxRkdwIrdASJ0+9o+j+jRrNq44xlgBVg0xgzryLQQle3r/VBnExOQGXAJuIdkVNU428BjY8zQZ5QDPwLX8C8X68ALJJBDmAEeEacxBlg1xvxeHmwaeKi/IVwE5hGpf+N53kK8Eit2GSqibjZ1gV9riLgd3EU86CMT04f3RYufkfhIwW3ECy5sIKdg3yUzC1xJ7MDiFyZja0xYX3wYAa+h0IfbSBpa/KYGHYpsCiHXDje1nSEZd4DEVgjWg8vGmCWXzAMmhesZIkzvkNTrIXoSStGziNC5A20DW8A5RI9cHCr5v4wxy+6sehyPfNcTa8AG8C3wvZIqo4dkxEZpwDVEiTtIKLQRb2zhKbpyJIvKGJfaI2Tm/yqhqxzXoIUSGRAPjfSqrY1DsRB6aRf4E3jqeXauaqA6Ik3IWJQ9B2na4o29HL8m+AYDkflbgYF9a9YMcB1Z4ftKYgi8B5aRcuRo1c7dRgWmkDi5pPbnPTZbpfYPyFamXKb2ge/0WsqybBEpJYKesQTbSuKyzqpPeM1579xfB27iTw4XN/T3BXCQ4/8kVhtuKoke1TFxAPyn95kOUkfEJbSSZdnHHAnWD0glZnEf8U4bEbQ6/E0xqbMkbE8Uc8DAasVKiUwMAYsxurYoMhKKcIWBIrDeIhrSBK+ZVNPPpO2xx8C2MWbccv74g/QZbSA7BReHwCJx+6sx8okHMLk47iAzWogksgk8wS8NO0hZOoc/foxe/wDPjTEj8CvhAlKj9AIkbIwsUu3JDMmoBUSfZhBd29eJLANb7ilEqCSwpwjzFMq5h3yWtyRsWSm2KMa5jhBDpg628z6ixl1tDzi+clfiJE6uuojKziNLRZuictsDXiHlRlKaN/FMB/hJyYSwBzxH9KsSX3pydQVZ5KpwBriDZFM0mpCZi3yvy6SqnwqZFPQ45ZOrAfFBOSKuXmpMZpXJ2iWEIVINRKMJmR1kX7VWYTNSmyQyX3JY1Edq2ykk3Q8Rb+wiK/dnwrX0EU5CgV20KERvHEMgROZ/8wMW/ZQ0YycAAAAASUVORK5CYII=";
		}

		/**
		 * 回到顶部
		 * @type {number}
		 */
		var showScrollToTop = 0,
			scroll_top_duration = 700;
		$(window).on('scroll', function () {

			var y_scroll_pos = window.pageYOffset;
			var scroll_pos_test = doc.querySelector("header").offsetHeight;

			if (y_scroll_pos > scroll_pos_test && showScrollToTop === 0) {
				$('.scroll-to-top').addClass('apc-fade');
				showScrollToTop = 1;
			}

			if (y_scroll_pos < scroll_pos_test && showScrollToTop === 1) {
				$('.scroll-to-top').removeClass('apc-fade');
				showScrollToTop = 0;
			}

		});
		//smooth scroll to top
		$('.scroll-to-top').on('click', function (event) {
			event.preventDefault();
			$('body,html').animate({
					scrollTop: 0,
					behavior: 'smooth'
				}, scroll_top_duration
			);
		});

		/**
		 * 登录弹窗
		 * @type {Element | null}
		 * @url http://www.semantic-ui.cn/modules/dimmer.html#/settings
		 */
		var s = doc.querySelector(".site-comments .login");
		try {
			if (s !== null && s !== undefined) {
				s.addEventListener("click", function () {
					var cover = $("#cover");
					cover.dimmer('setting', {
						onShow: function () {
							//doc.querySelector(".ui.apc-user").style.display = "block";
							$('.ui.apc-user').transition('scale');
						},
						onHide: function () {
							//doc.querySelector(".ui.apc-user").style.display = "none";
							$('.ui.apc-user').transition('scale');
						}
					});
					cover.dimmer('toggle');
				})
			}
		} catch (err) {
			console.log(err);
		}
		/**
		 * 登录注册切换
		 * @type {Element | null}
		 */
		var reg = doc.querySelector(".user-features .registered"),
			log = doc.querySelector(".user-features .login");
		try {
			if (reg !== null && reg !== undefined) {
				reg.addEventListener("click", function () {
					reg.setAttribute("class", "ui button registered active");
					log.setAttribute("class", "ui button login");
					doc.querySelector("form.registered").style.display = "block";
					doc.querySelector("form.login").style.display = "none";
				})
			}
			if (log !== null && log !== undefined) {
				log.addEventListener("click", function () {
					reg.setAttribute("class", "ui button registered");
					log.setAttribute("class", "ui button login active");
					doc.querySelector("form.registered").style.display = "none";
					doc.querySelector("form.login").style.display = "block";
				})
			}
		} catch (err) {
			console.log(err)
		}

		/**
		 * 搜索历史纪录
		 */
		$(document).delegate(".search-delete>div", "click", function() {
			$("#search-input").val($(this).text());
		});

		/*搜索记录相关*/
		//从localStorage获取搜索时间的数组
		var hisTime;
		//从localStorage获取搜索内容的数组
		var hisItem;
		//从localStorage获取最早的1个搜索时间
		var firstKey;

		function init_search() {
			//每次执行都把2个数组置空
			hisTime = [];
			hisItem = [];
			//模拟localStorage本来有的记录
			//localStorage.setItem("a",12333);
			//本函数内的两个for循环用到的变量
			var i = 0;
			for(; i < localStorage.length; i++) {
				if(!isNaN(localStorage.key(i))) {
					hisItem.push(localStorage.getItem(localStorage.key(i)));
					hisTime.push(localStorage.key(i));
				}
			}
			i = 0;
			//执行init_search(),每次清空之前添加的节点
			var sd = $(".search-delete");
			sd.html("");
			for(; i < hisItem.length; i++) {
				//alert(hisItem);
				sd.prepend('<div class="word-break"><a href="#">' + hisItem[i] + '</a></div>')
			}
		}
		init_search();

		$("#mobile-search").click(function() {
			var value = $("#search-input").val();
			var time = (new Date()).getTime();

			if(!value) {
				alert("请输入搜索内容");
				return false;
			}

			//输入的内容localStorage有记录
			if($.inArray(value, hisItem) >= 0) {
				for(var j = 0; j < localStorage.length; j++) {
					if(value === localStorage.getItem(localStorage.key(j))) {
						localStorage.removeItem(localStorage.key(j));
					}
				}
				localStorage.setItem(time, value);
			}
			//输入的内容localStorage没有记录
			else {
				//由于限制了只能有6条记录，所以这里进行判断
				if(hisItem.length > 10) {
					firstKey = hisTime[0];
					localStorage.removeItem(firstKey);
					localStorage.setItem(time, value);
				} else {
					localStorage.setItem(time, value)
				}
			}
			init_search();
			//正式的时候要提交的！！！
			//$("#form1").submit()

		});

		//清除记录功能
		$("#history-clear").click(function() {
			var f = 0;
			for(; f < hisTime.length; f++) {
				localStorage.removeItem(hisTime[f]);
			}
			init_search();
		});
		//苹果手机不兼容出现input无法取值以下是解决方法
		$(function() {
			$('.word-break').click(function() {
				var div = $(this).text();
				$('#search-input').val(div);
			});
			//取到值以后button存储无法取值，这里强迫浏览器强行刷新可解决
			$('#mobile-search').click(function() {
				window.location.reload();
			})
		});

		/**
		 * 移动端搜索功能
		 * @type {Element | null}
		 */
		var ns = doc.querySelector("a.nav-search");
		var cb = doc.querySelector(".ui.button.back");
		try {
			if (ns !== null && ns !== undefined) {
				ns.addEventListener("click", function () {
					//doc.querySelector(".ui.apc-mobile-search").style.display = "block";
					$('.ui.apc-mobile-search').transition('slide up');
					doc.querySelector("body").style.overflow = "hidden";
				});
			}
		} catch (err) {
			console.log(err);
		}
		try {
			if (cb !== null && cb !== undefined) {
				cb.addEventListener("click", function () {
					//doc.querySelector(".ui.apc-mobile-search").style.display = "none";
					$('.ui.apc-mobile-search').transition('slide up');
					doc.querySelector("body").style.overflow = "scroll";
				});
			}
		} catch (err) {
			console.log(err);
		}

		/**
		 *  组件初始化配置
		 */
		$('.ui.accordion').accordion('setting', {
			onOpening: function () {
				//当前图标
				var i = Object(this).context.children[0];
				$(i).css({
					"transform": "rotate(180deg)",
					"-webkit-transform": "rotate(180deg)"
				})
			},
			onClosing: function () {
				//当前图标
				var i = Object(this).context.children[0];
				$(i).css({
					"transform": "rotate(0)",
					"-webkit-transform": "rotate(0)"
				})
			}
		});
	});
})(jQuery, document);
