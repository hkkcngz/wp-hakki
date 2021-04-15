// Main Scripts

const cookieBox = document.querySelector(".cookie-alert"),
	acceptBtn = cookieBox.querySelector("button");

if (cookieBox) {
	acceptBtn.onclick = () => {
		//setting cookie for 1 month, after one month it'll be expired automatically
		document.cookie = "CookieBy=hakki; max-age=" + 60 * 60 * 24 * 30;
		if (document.cookie) { //if cookie is set
			cookieBox.classList.add("hide"); //hide cookie box
		} else { //if cookie not set then alert an error
			alert("Cookie can't be set! Please unblock this site from the cookie setting of your browser.");
		}
	}
	let checkCookie = document.cookie.indexOf("CookieBy=hakki"); //checking our cookie
	//if cookie is set then hide the cookie box else show it
	checkCookie != -1 ? cookieBox.classList.add("hide") : cookieBox.classList.remove("hide");
}

let sideMiddle =  document.getElementById('side-middle');
if ( sideMiddle ) {
	function scrollToBottom() {
		sideMiddle.scrollTop = 9999999;
	}
}



$(document).ready(function () {

	// Dark Mode
	let lamba = document.querySelector('.top');
	// press the button to toggle the .dark-mode class
	lamba.addEventListener('click', () => {
		document.documentElement.classList.toggle('dark-mode');
	});
	// Dark Mode

	// tabela düştü
	let tabela = document.querySelector('.yakinda'),
		civi = document.getElementById('civi');

	civi.addEventListener('click', () => {
		tabela.classList.toggle('dustu');
	});

	// tabela düşer

	$(".pageloader").show().fadeOut(2600);

	// Burger
	var navTrigger = document.getElementsByClassName('burger')[0],
		overlay = document.getElementsByClassName('overlay')[0],
		body = document.getElementsByTagName('body')[0];

	navTrigger.addEventListener('click', toggleNavigation);
	overlay.addEventListener('click', OffNavigation);

	function toggleNavigation(e) {
		body.classList.toggle('nav-open');

		$('.burger').toggleClass('open');
		$('.x, .y, .z').toggleClass('collapse');
		setTimeout(function () {
			$('.y').toggle();
			$('.x').toggleClass('rotate30');
			$('.z').toggleClass('rotate150');
		}, 70);
		setTimeout(function () {
			$('.x').toggleClass('rotate45');
			$('.z').toggleClass('rotate135');
		}, 120);


		// Mysidemenu
		$('.sidemenu').toggleClass('opened');
		// Mysidemenu
	}

	function OffNavigation() {
		body.classList.toggle('nav-open');
		//main.classList.toggle('boxShadow');
		$('.burger').toggleClass('open');
		$('.x, .y, .z').toggleClass('collapse');
		setTimeout(function () {
			$('.y').toggle();
			$('.x').toggleClass('rotate30');
			$('.z').toggleClass('rotate150');
		}, 70);
		setTimeout(function () {
			$('.x').toggleClass('rotate45');
			$('.z').toggleClass('rotate135');
		}, 120);

		// Mysidemenu
		$('.sidemenu').toggleClass('opened');
		// Mysidemenu
	}

	// Bu Yazı Kaç Dakikada Okunur?
	var readingTimeElement = document.getElementById('reading-time');
	if (readingTimeElement) {
		var txt = $(".post-full-content")[0].textContent,
			wordCount = txt.replace(/[^\w ]/g, "").split(/\s+/).length;
		var readingTimeInMinutes = Math.floor(wordCount / 228) + 1;
		var readingTimeAsString = readingTimeInMinutes + " dakika";

		$(readingTimeElement).html(readingTimeAsString);
	}
	// Bu Yazı Kaç Dakikada Okunur?


	const items = document.querySelectorAll('.slider-item');
	if (items) {
		const itemCount = items.length;
		const nextItem = document.querySelector('.next');
		const previousItem = document.querySelector('.previous');
		let count = 0;

		function showNextItem() {
			items[count].classList.remove('active');

			if (count < itemCount - 1) {
				count++;
			} else {
				count = 0;
			}

			items[count].classList.add('active');
			console.log(count);
		}

		function showPreviousItem() {
			items[count].classList.remove('active');

			if (count > 0) {
				count--;
			} else {
				count = itemCount - 1;
			}

			items[count].classList.add('active');
			// Check if working...
			console.log(count);
		}

		function keyPress(e) {
			e = e || window.event;

			if (e.keyCode == '37') {
				showPreviousItem();
			} else if (e.keyCode == '39') {
				showNextItem();
			}
		}

		nextItem.addEventListener('click', showNextItem);
		previousItem.addEventListener('click', showPreviousItem);
		document.addEventListener('keydown', keyPress);
	}

	// Single Post Customize Elements
	var fontSizeToggle = document.getElementById('normal');
	var commentsToggle = document.querySelector('.toggleCommentform');
	if (commentsToggle) {
		$(".toggleCommentform").click(function () {
			$(".single-comments-form").toggle();
		});

		$(".toggleComments").click(function () {
			$(".single-comments-content").toggle();
		});
	}

	if (fontSizeToggle) {
		$("#normal").on("click", function () {
			$(".single-content").removeClass("up down").addClass("normal");
		});

		$("#up").on("click", function () {
			$(".single-content").removeClass("normal down").addClass("up");
		});

		$("#down").on("click", function () {
			$(".single-content").removeClass("normal up").addClass("down");
		});
	}



	// Plugins    


	/* Toggle Video Modal
	-----------------------------------------*/
	function toggle_video_modal() {

		// Click on video thumbnail or link
		$(".js-trigger-video-modal").on("click", function (e) {

			// prevent default behavior for a-tags, button tags, etc. 
			e.preventDefault();

			// Grab the video ID from the element clicked
			var id = $(this).attr('data-youtube-id');

			// Autoplay when the modal appears
			// Note: this is intetnionally disabled on most mobile devices
			// If critical on mobile, then some alternate method is needed
			var autoplay = '?autoplay=1';

			// Don't show the 'Related Videos' view when the video ends
			var related_no = '&rel=0';

			// String the ID and param variables together
			var src = '//www.youtube.com/embed/' + id + autoplay + related_no;

			// Pass the YouTube video ID into the iframe template...
			// Set the source on the iframe to match the video ID
			$("#youtube").attr('src', src);

			// Add class to the body to visually reveal the modal
			$("body").addClass("show-video-modal noscroll");

		});

		// Close and Reset the Video Modal
		function close_video_modal() {

			event.preventDefault();

			// re-hide the video modal
			$("body").removeClass("show-video-modal noscroll");

			// reset the source attribute for the iframe template, kills the video
			$("#youtube").attr('src', '');

		}
		// if the 'close' button/element, or the overlay are clicked 
		$('body').on('click', '.close-video-modal, .video-modal .overlay', function (event) {

			// call the close and reset function
			close_video_modal();

		});
		// if the ESC key is tapped
		$('body').keyup(function (e) {
			// ESC key maps to keycode `27`
			if (e.keyCode == 27) {

				// call the close and reset function
				close_video_modal();

			}
		});
	}
	if ($('.tilt-poster')) {

		/* Tilt oldum 
		-----------------------------------------*/
		$('.tilt-poster').tilt({
			scale: 1.05,
			perspective: 500
		});

		toggle_video_modal();
	}

});