#!/bin/bash
array=( "Give" "Give-2Checkout" "Give-Dwolla" "Give-Email-Reports" "Give-Fee-Recovery" "Give-Form-Field-Manager" "Give-Gift-Aid" "Give-Manual-Donations" "Give-PDF-Receipts" "Give-Recurring-Donations" "Give-Tributes" "Give-Stripe" "Give-WePay" "Give-Authorize-Gateway" "Give-AWeber" "Give-Braintree-Gateway" "Give-CCAvenue" "Give-Constant-Contact" "Give-ConvertKit" "Give-CSV-Toolbox" "" "Give-Dedications" "Give-Display-Donors" "Give-EOY-Statements" "Give-Form-Countdown" "Give-Google-Analytics" "Give-iATS" "Give-Paymill" "Give-Per-Form-Confirmation-Messages" "Give-WePay" "Give-WP-All-Import-Addon" "Google-Maps-Builder" )
for element in ${array[@]}
do
	# For username and password
    # eval "git clone https://github.com/WordImpress/"$element".git"

    # for SSH
    eval "git clone git@github.com:WordImpress/"$element".git"
done