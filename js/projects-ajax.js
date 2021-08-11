( function($) {
	let $window = $(window);
	let $document = $(document);

	let $sectionProjects = $('.section-projects--js-ajax');
	let $projectsContainer = $sectionProjects.find('.section__content');

	if ( !$sectionProjects.length ) {
		return;
	}

	let page = 1;
	let maxPages = $sectionProjects.data('max-pages');
	let isLoading = false;

	loadProjectsWithAjaxOnCategoryChange();

	loadMoreProjectsWithAjaxOnScroll()

	function loadProjectsWithAjaxOnCategoryChange() {
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

			// Remove projects from the previous clicked category
			$projectsContainer.empty();

			// Show loading icon while getting the data from back end
			$sectionProjects.addClass('section-projects--loading');

			let ajaxData = {
				action: 'get_projects_ajax',
			};

			let categoryId = $this.attr('href');

			if (categoryId != 'all') {
				ajaxData.term_id = categoryId;
			}

			$.ajax({
				type: "GET",
				url: idt_projects.ajax_url,
				data: ajaxData,
				success: function(result) {
					if (result['success']) {
						let responseHtml = $(result['data']['html']);

						maxPages = result['data']['max_num_pages'];

						$projectsContainer.append(responseHtml);
					}
				},
				error: function(error) {
					console.log(error);
				},
				complete: function() {
					$sectionProjects.removeClass('section-projects--loading');

					isLoading = false;
				}
			});
		});
	}

	function loadMoreProjectsWithAjaxOnScroll() {
		$window.on('load scroll', loadMoreProjectsWithAjax);
	}

	function loadMoreProjectsWithAjax() {
		if ( isLoading ) {
			return;
		}

		let scrollBottom = $document.scrollTop() + $window.innerHeight();
		let bottomPositionOfProjects = $sectionProjects.offset().top + $sectionProjects.outerHeight(true);

		let differenceInPosition = bottomPositionOfProjects - scrollBottom;

		// If the difference between bottom position of the projects section and the
		// top position of the scrolled document is smaller than 500px load more posts
		if ( differenceInPosition < 500 ) {
			isLoading = true;

			let ajaxData = {
				action: 'get_projects_ajax',
			};

			let $selectedCategory = $sectionProjects.find('.categories .active');
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
			$sectionProjects.addClass('section-projects--loading');

			ajaxData.page = page;

			$.ajax({
				type: "GET",
				url: idt_projects.ajax_url,
				data: ajaxData,
				success: function(result) {
					if (result['success']) {
						let responseHtml = $(result['data']['html']);

						$projectsContainer.append(responseHtml);
					}
				},
				error: function(error) {
					console.log(error);
				},
				complete: function() {
					isLoading = false;

					$sectionProjects.removeClass('section-projects--loading');

					if ( differenceInPosition < 500 ) {
						loadMoreProjectsWithAjax();
					}
				}
			});
		}
	}
}(jQuery) );
