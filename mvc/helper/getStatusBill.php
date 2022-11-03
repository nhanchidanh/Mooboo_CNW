<?php

function getStatusBill($status) {
	switch($status) {
		case 0:
			echo "Processing";
			break;
		case 1:
			echo "In transit";
			break;
		case 2:
			echo "Delivered";
			break;
	}
}