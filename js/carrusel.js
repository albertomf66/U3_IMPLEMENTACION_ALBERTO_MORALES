


new Glider(document.querySelector('.glider'), {
  slidesToScroll: 1,
  slidesToShow: 1,
  draggable: true,
  animated: true,
  dots: '.dots',
  arrows: {
    prev: '.glider-prev',
    next: '.glider-next'
  },responsive: [
    		{
		      // screens greater than >= 775px
		      breakpoint: 740,
		      settings: {
		        // Set to `auto` and provide item width to adjust to viewport
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        itemWidth: 600,
		        duration: 0.25
		      }
		    },{
		      // screens greater than >= 1024px
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        itemWidth: 150,
		        duration: 0.25
		      }
		    }
		  ]



		  
});

 