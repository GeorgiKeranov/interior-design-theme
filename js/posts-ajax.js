( function($) {
	let $window = $(window);
	let $document = $(document);

	let $sectionPosts;
	let currentPostType = '';

	let postTypes = ['posts', 'projects'];
	for (let index in postTypes) {
		$sectionPosts = $('.section-' + postTypes[index] + '--js-ajax');

		if ($sectionPosts.length) {
			currentPostType = postTypes[index];
			break;
		}
	}
	
	if (!$sectionPosts.length) {
		return;
	}

	$containerPosts = $sectionPosts.find('.section__content');

	let page = 1;
	let maxPages = $sectionPosts.data('max-pages');
	let isLoading = false;

	loadPostsWithAjaxOnCategoryChange();

	loadMorePostsWithAjaxOnScroll()

	function loadPostsWithAjaxOnCategoryChange() {
		let $categoriesContainer = $('.categories');
		let $categories = $categoriesContainer.find( 'a' );

		if (!$categories.length) {
			return;
		}

		$categories.on('click', function(e) {
			e.preventDefault();

			let $this = $(this);

			// If this category is already active stop the function
			if ($this.hasClass('active')) {
				return;
			}

			if (isLoading) {
				return;
			}

			isLoading = true;

			page = 1;

			// Remove active state from previous clicked category
			let $activeCategory = $categoriesContainer.find('.active');
			$activeCategory.removeClass('active');

			// Add active state to the recently clicked category
			$this.addClass('active');

			// Remove posts from the previous clicked category
			$containerPosts.empty();

			// Show loading icon while getting the data from back end
			$sectionPosts.addClass('section-' + currentPostType + '--loading');

			let ajaxData = {
				action: 'get_' + currentPostType + '_ajax',
			};

			let categoryId = $this.attr('href');

			if (categoryId != 'all') {
				ajaxData.term_id = categoryId;
			}

			$.ajax({
				type: "GET",
				url: idt_posts.ajax_url,
				data: ajaxData,
				success: function(result) {
					if (result['success']) {
						let responseHtml = $(result['data']['html']);

						maxPages = result['data']['max_num_pages'];

						$containerPosts.append(responseHtml);
					}
				},
				error: function(error) {
					console.log(error);
				},
				complete: function() {
					$sectionPosts.removeClass('section-' + currentPostType + '--loading');

					isLoading = false;

					loadMorePostsWithAjax();
				}
			});
		});
	}

	function loadMorePostsWithAjaxOnScroll() {
		$window.on('load scroll', loadMorePostsWithAjax);
	}

	function loadMorePostsWithAjax() {
		if ( isLoading ) {
			return;
		}

		let scrollBottom = $document.scrollTop() + $window.innerHeight();
		let bottomPositionOfPosts = $sectionPosts.offset().top + $sectionPosts.outerHeight(true);

		let differenceInPosition = bottomPositionOfPosts - scrollBottom;

		// If the difference between bottom position of the posts section and the
		// top position of the scrolled document is smaller than 500px load more posts
		if ( differenceInPosition < 500 ) {
			isLoading = true;

			let ajaxData = {
				action: 'get_' + currentPostType + '_ajax',
			};

			let $selectedCategory = $sectionPosts.find('.categories .active');
			if ($selectedCategory.length ) {
				let categoryId = $selectedCategory.attr('href');

				if (categoryId != 'all') {
					ajaxData.term_id = categoryId;
				}
			}

			page = page + 1;

			if (page > maxPages) {
				isLoading = false;
				return;
			}

			// Show loading icon while getting the data from back end
			$sectionPosts.addClass('section-' + currentPostType + '--loading');

			ajaxData.page = page;

			$.ajax({
				type: "GET",
				url: idt_posts.ajax_url,
				data: ajaxData,
				success: function(result) {
					if (result['success']) {
						let responseHtml = $(result['data']['html']);

						$containerPosts.append(responseHtml);
					}
				},
				error: function(error) {
					console.log(error);
				},
				complete: function() {
					isLoading = false;

					$sectionPosts.removeClass('section-' + currentPostType + '--loading');

					if ( differenceInPosition < 500 ) {
						loadMorePostsWithAjax();
					}
				}
			});
		}
	}
}(jQuery) );
