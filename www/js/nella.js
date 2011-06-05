/**
 * This file is part of the Nella Framework.
 *
 * Copyright (c) 2006, 2011 Patrik Votoček (http://patrik.votocek.cz)
 *
 * This source file is subject to the GNU Lesser General Public License. For more information please see http://nellacms.com
 */

head.ready(function() {
	$('input[type=date],input[type=datetime],input[type=time]').each(function() {
		$this = $(this);
		$el = $this.clone();
		$el.attr('type', "text");
		if ($this.attr('type') == "date") {
			$el.datepicker({ dateFormat: $this.attr('data-nella-forms-date')});
		} else if ($this.attr('type') == "time") {
			$el.timepicker({ timeFormat: $this.attr('data-nella-forms-time') });
		} else if ($this.attr('type') == "datetime") {
			$el.datetimepicker({
				dateFormat: $this.attr('data-nella-forms-date'),
				timeFormat: $this.attr('data-nella-forms-time')
			});
		}
		$this.replaceWith($el);
	});

	$('[data-nella-confirm]').each(function() {
		$this = $(this);
		$this.bind('click', function() { return confirm($this.attr('data-nella-confirm')) });
	});

	$('input[type=file][multiple][data-nella-mfu-token]').each(function() {
		$this = $(this);
		$this.nellaMultipleFileUploader({
			token: $this.attr('data-nella-mfu-token')
		});
	});
})