$j(document).ready(function() {
	$j('#careplanprocess .img-circle').click(function() {
		$j('#careplanprocess .img-circle').each(function(i) {
			if ($j(this).hasClass('cppover')) {
				$j(this).removeClass('cppover')
			};
		});
		$j(this).toggleClass('cppover');
		if ($j(this).parent().attr('id') == 'casestarts_circ') {
			$j('#hwwddes').html('Call 1(800) 293-8973 or complete our online client registration; we will contact you within two hours and you will be connected with a dedicated client services representative. We’ll discuss your situation and determine if you must act quickly. If your need is immediate, we can provide a temporary caregiver during the short time that Steps 2 and 3 are occurring.').show()
		};
		if ($j(this).parent().attr('id') == 'assesment_circ') {
			$j('#hwwddes').html('A Lifematters client service representative interviews our potential client, family member or legal representative by telephone, e-mail or in person to get all the information necessary to complete a Lifematters Medical and Lifestyle Profile that will assist in selecting the right caregiver.<br>Interview categories include:<ul>' + '<li>Name and address</li><li>Nicknames and how you would like to be addressed</li><li>Age</li><li>Present living arrangements</li><li>Name of friends and relatives</li><li>Family involvement in current lifestyle</li><li>Former or present occupation</li><li>Daily routine</li><li>Lifetime accomplishments</li><li>Social activities</li><li>Leisure activities</li><li>Review of medical history</li><li>Current level of physical mobility</li><li>Type of assistance needed</li><li>Any use of medical equipment</li><li>Mental status</li><li>Any outside support services currently being used</li><li>Scope of services required by Lifematters</li><li>Type and qualifications of personnel</li><li>Potential schedule</li><li>Start of service date</li></ul>').show()
		};
		if ($j(this).parent().attr('id') == 'matching_circ') {
			$j('#hwwddes').html('After we discuss and assess your needs, we will create a list of experienced caregivers whose skillsets and demeanor best match your needs based on:' + '<ul><li>License, scope of practice</li><li>Experience, skills assessment scores</li><li>Transportation availability</li><li>Location</li><li>Hours available based on client’s requirements</li><li>Personality</li></ul>After reviewing the list, Lifematters client services and clinical teams work together to select and assign the most appropriate caregiver. If requested, clients can then schedule in-person interviews in order to assure a perfect match.').show()
		};
		if ($j(this).parent().attr('id') == 'carebegins_circ') {
			$j('#hwwddes').html('We will send you a complete welcome kit containing all of the information you need, and together we will confirm a start-of-care date. A Lifematters registered nurse will schedule and also complete a detailed assessment and caregiving plan. Once your caregiver has begun working with your family, you will receive a follow-up assessment by a Lifematters registered nurse on a regularly scheduled and periodic, ongoing basis to monitor progress and make adjustments as necessary. To ensure that our caregivers continue to provide our standard exemplary level of care, ongoing check-ins by our home care quality and relationship experts will take place for the length of our engagement').show()
		};
	});
});