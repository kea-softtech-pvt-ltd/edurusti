<?php
include_once('includes/application_top.php');
?>
<!DOCTYPE html>
<html lang="en" class="print">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> eDurusti</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
	<script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
	<link href="assets/invoice.css" rel="stylesheet" type="text/css"/>
	
</head>	
<body>
	<header>
		<h1>Invoice</h1>
	</header>		
	<?php		
	include_once('class/repair.php');
	$Repair_mob = new Repair($db);
	$invoice = $Repair_mob->check_invoice(base64_decode($_REQUEST['id']));
	if(!empty($invoice['html']))
	{
		?>
		<article id="data"><?php echo $invoice['html']; ?></article>
		<?php
	}
	else
	{		
		$Repair_mob_ = $Repair_mob->getAllcustomerdata(base64_decode($_REQUEST['id']));
		$Repair_issues = new Repair($db);
		$Repair_issues_ = $Repair_issues->getAllissue($Repair_mob_['issues_id']);
		$num = count($Repair_issues_);?>
		<article id="data">
			<h1>Recipient</h1>
			<address contenteditable>
				<p class="site_title">eDurusti</p>
				<p><b><?php echo  $Repair_mob_['full_name'];?></b></p>
				<p><b><?php echo  $Repair_mob_['address'];?><br/><?php echo  $Repair_mob_['pin_code'];?></b></p>
				<p class="m-t-10">+91<?php echo  $Repair_mob_['mobile_number'];?></p>
			</address>
			<table class="meta">
				<tr>
					<th><span contenteditable>Invoice #</span></th>
					<td><span contenteditable> <?php echo  $Repair_mob_['ord_id'];?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Order ID</span></th>
					<td><span contenteditable><?php echo  $Repair_mob_['order_number'];?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable>October 19, 2019</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Due</span></th>
					<td><span id="prefix" contenteditable>RS &nbsp;</span><span>600.00</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span contenteditable>Issue</span></th>
						<th><span contenteditable>Description</span></th>
						<th><span contenteditable>Rate</span></th>
						<th><span contenteditable>Quantity</span></th>
						<th><span contenteditable>Price</span></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if($num > 0) 
					{	
						for($i=0;$i<$num;$i++)				
						{
							?>
							<tr>
								<td><a class="cut">-</a><span contenteditable><?php echo $Repair_issues_[$i]['title'];?></span></td>
								<td><span contenteditable></span></td>
								<td><span data-prefix>Rs</span><span contenteditable>0.00</span></td>
								<td><span contenteditable>1</span></td>
								<td><span data-prefix>Rs</span><span>0.00</span></td>
							</tr>
							<?php                
						}			
					}	
					?>					
				</tbody>
			</table>
			<a class="add">+</a>
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix>Rs</span><span>600.00</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Paid</span></th>
					<td><span data-prefix>Rs</span><span contenteditable>0.00</span></td>
				</tr>
				<tr style="display:;">
					<th><span contenteditable>Balance Due</span></th>
					<td><span data-prefix>Rs</span><span>600.00</span></td>
				</tr>
			</table>
		</article>
		<?php
	}
	?>
	<aside>
		<h1><span contenteditable>Additional Notes</span></h1>
		<div contenteditable>
			<p>A GST charges of 5% will be made on unpaid balances after 30 days.</p>
		</div>
	</aside><br/>
	<?php 
	if(isset($_REQUEST['t'])) 
	{ 			
		?>
		<script>
		$(document).ready(function() {
			$(".add, .cut").hide();
			$('span, div, address').removeAttr('contenteditable');
		});
		</script>
		<?php
	}
	else
	{	
		?>
		<input type="button" class="button" onclick="printPage();" value="Save & Print"/>
		<?php
	}
	?>	
	<script>
	/* ========================================================================== */
	function printPage()
	{
		$.ajax({
			url: "ajax/ajax_mobile_repair.php", 
			type: "POST",
			data: { action:'save_invoice', ord_id : "<?php echo base64_decode($_REQUEST['id']); ?>", _html : $.trim($("#data").html()) },
			success: function(result){
				if($.trim(result)=='success')			
					window.print();	
			}	
		});
	}
	(function (document) {
		var
		head = document.head = document.getElementsByTagName('head')[0] || document.documentElement,
		elements = 'article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output picture progress section summary time video x'.split(' '),
		elementsLength = elements.length,
		elementsIndex = 0,
		element;

		while (elementsIndex < elementsLength) {
			element = document.createElement(elements[++elementsIndex]);
		}

		element.innerHTML = 'x<style>' +
			'article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}' +
			'audio[controls],canvas,video{display:inline-block}' +
			'[hidden],audio{display:none}' +
			'mark{background:#FF0;color:#000}' +
		'</style>';

		return head.insertBefore(element.lastChild, head.firstChild);
	})(document);

	/* Prototyping
	/* ========================================================================== */

	(function (window, ElementPrototype, ArrayPrototype, polyfill) {
		function NodeList() { [polyfill] }
		NodeList.prototype.length = ArrayPrototype.length;

		ElementPrototype.matchesSelector = ElementPrototype.matchesSelector ||
		ElementPrototype.mozMatchesSelector ||
		ElementPrototype.msMatchesSelector ||
		ElementPrototype.oMatchesSelector ||
		ElementPrototype.webkitMatchesSelector ||
		function matchesSelector(selector) {
			return ArrayPrototype.indexOf.call(this.parentNode.querySelectorAll(selector), this) > -1;
		};

		ElementPrototype.ancestorQuerySelectorAll = ElementPrototype.ancestorQuerySelectorAll ||
		ElementPrototype.mozAncestorQuerySelectorAll ||
		ElementPrototype.msAncestorQuerySelectorAll ||
		ElementPrototype.oAncestorQuerySelectorAll ||
		ElementPrototype.webkitAncestorQuerySelectorAll ||
		function ancestorQuerySelectorAll(selector) {
			for (var cite = this, newNodeList = new NodeList; cite = cite.parentElement;) {
				if (cite.matchesSelector(selector)) ArrayPrototype.push.call(newNodeList, cite);
			}

			return newNodeList;
		};

		ElementPrototype.ancestorQuerySelector = ElementPrototype.ancestorQuerySelector ||
		ElementPrototype.mozAncestorQuerySelector ||
		ElementPrototype.msAncestorQuerySelector ||
		ElementPrototype.oAncestorQuerySelector ||
		ElementPrototype.webkitAncestorQuerySelector ||
		function ancestorQuerySelector(selector) {
			return this.ancestorQuerySelectorAll(selector)[0] || null;
		};
	})(this, Element.prototype, Array.prototype);

	/* Helper Functions
	/* ========================================================================== */

	function generateTableRow() {
		var emptyColumn = document.createElement('tr');

		emptyColumn.innerHTML = '<td><a class="cut">-</a><span contenteditable></span></td>' +
			'<td><span contenteditable></span></td>' +
			'<td><span data-prefix>$</span><span contenteditable>0.00</span></td>' +
			'<td><span contenteditable>0</span></td>' +
			'<td><span data-prefix>$</span><span>0.00</span></td>';

		return emptyColumn;
	}

	function parseFloatHTML(element) {
		return parseFloat(element.innerHTML.replace(/[^\d\.\-]+/g, '')) || 0;
	}

	function parsePrice(number) {
		return number.toFixed(2).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1,');
	}

	/* Update Number
	/* ========================================================================== */

	function updateNumber(e) {
		var
		activeElement = document.activeElement,
		value = parseFloat(activeElement.innerHTML),
		wasPrice = activeElement.innerHTML == parsePrice(parseFloatHTML(activeElement));

		if (!isNaN(value) && (e.keyCode == 38 || e.keyCode == 40 || e.wheelDeltaY)) {
			e.preventDefault();

			value += e.keyCode == 38 ? 1 : e.keyCode == 40 ? -1 : Math.round(e.wheelDelta * 0.025);
			value = Math.max(value, 0);

			activeElement.innerHTML = wasPrice ? parsePrice(value) : value;
		}

		updateInvoice();
	}

	/* Update Invoice
	/* ========================================================================== */

	function updateInvoice() {
		var total = 0;
		var cells, price, total, a, i;

		// update inventory cells
		// ======================

		for (var a = document.querySelectorAll('table.inventory tbody tr'), i = 0; a[i]; ++i) {
			// get inventory row cells
			cells = a[i].querySelectorAll('span:last-child');

			// set price as cell[2] * cell[3]
			price = parseFloatHTML(cells[2]) * parseFloatHTML(cells[3]);

			// add price to total
			total += price;

			// set row total
			cells[4].innerHTML = price;
		}

		// update balance cells
		// ====================

		// get balance cells
		cells = document.querySelectorAll('table.balance td:last-child span:last-child');

		// set total
		cells[0].innerHTML = total;

		// set balance and meta balance
		cells[2].innerHTML = document.querySelector('table.meta tr:last-child td:last-child span:last-child').innerHTML = parsePrice(total - parseFloatHTML(cells[1]));

		// update prefix formatting
		// ========================

		var prefix = document.querySelector('#prefix').innerHTML;
		for (a = document.querySelectorAll('[data-prefix]'), i = 0; a[i]; ++i) a[i].innerHTML = prefix;

		// update price formatting
		// =======================

		for (a = document.querySelectorAll('span[data-prefix] + span'), i = 0; a[i]; ++i) if (document.activeElement != a[i]) a[i].innerHTML = parsePrice(parseFloatHTML(a[i]));
	}

	/* On Content Load
	/* ========================================================================== */

	function onContentLoad() {
		updateInvoice();

		var
		input = document.querySelector('input'),
		image = document.querySelector('img');

		function onClick(e) {
			var element = e.target.querySelector('[contenteditable]'), row;

			element && e.target != document.documentElement && e.target != document.body && element.focus();

			if (e.target.matchesSelector('.add')) {
				document.querySelector('table.inventory tbody').appendChild(generateTableRow());
			}
			else if (e.target.className == 'cut') {
				row = e.target.ancestorQuerySelector('tr');

				row.parentNode.removeChild(row);
			}

			updateInvoice();
		}
		
		function onEnterCancel(e) {
			e.preventDefault();

			//image.classList.add('hover');
		}

		function onLeaveCancel(e) {
			e.preventDefault();

			//image.classList.remove('hover');
		}

		function onFileInput(e) {
			//image.classList.remove('hover');

			var
			reader = new FileReader(),
			files = e.dataTransfer ? e.dataTransfer.files : e.target.files,
			i = 0;

			reader.onload = onFileLoad;

			while (files[i]) reader.readAsDataURL(files[i++]);
		}

		function onFileLoad(e) {
			var data = e.target.result;

			image.src = data;
		}

		if (window.addEventListener) {
			document.addEventListener('click', onClick);

			document.addEventListener('mousewheel', updateNumber);
			document.addEventListener('keydown', updateNumber);

			document.addEventListener('keydown', updateInvoice);
			document.addEventListener('keyup', updateInvoice);

			input.addEventListener('focus', onEnterCancel);
			input.addEventListener('mouseover', onEnterCancel);
			input.addEventListener('dragover', onEnterCancel);
			input.addEventListener('dragenter', onEnterCancel);

			input.addEventListener('blur', onLeaveCancel);
			input.addEventListener('dragleave', onLeaveCancel);
			input.addEventListener('mouseout', onLeaveCancel);

			input.addEventListener('drop', onFileInput);
			input.addEventListener('change', onFileInput);
		}
	}

	window.addEventListener && document.addEventListener('DOMContentLoaded', onContentLoad);
	</script>
</body>
</html>

		