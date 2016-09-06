var $j = jQuery, years=[['2004','<p>Founder Scott Thompson establishes Lifematters.</p>'],['2006','<p>Company grows to include 10 corporate office associates and 350 caregivers, with 380 clients serviced.</p><p>Operations expand with two new offices in Washington, D.C. and Virginia.</p>'],['2010','<p>FlexCare offices opened in three assisted living and retirement communities.'],['2011','<p>The Virginia office moves to a larger space to accommodate its growing number of associates and clients, and another FlexCare location opens. <p>For the first time, Lifematters accomplishes its goal of serving more than 1,000 clients during a single year.</p>'],['2012','<p>Three new FlexCare sites opened. Team expands to 1,100 caregivers and 32 corporate associates. 1,235 clients serviced.</p>'],['2013','<p>Lifematters acquires the Maryland office of HouseWorks, a home care company headquartered in Boston, MA.</p><p>Clinical associates grows to include five Registered Nurses and 32 corporate associates, with 1,350 clients serviced.</p>'],['2014','<p>Lifematters reaches its 10th anniversary with more than 1,200 associates and 1,500 annual clients. FlexCare locations now number eight.</p>']];

$j(document).ready(function(){

	$j('#ourhistorytimeline').append('<div class="timeline-main-hr"></div><div class="timeline-circ-frame"></div>')
	
	for(var i=0; i<years.length; i++){ 
		var circ = BuildCircle('circ'+years[i][0],years[i][0],years[i][1]);
		$j('#ourhistorytimeline .timeline-circ-frame').append(circ);
	}
	
	var circlength = $j('.timeline-circ').length
	$j('.timeline-circ').each(function(i){ if( i >= circlength -4 ){ $j(this).removeClass('teal_bg').addClass('ltpurp_bg')  } });
	
	
});

var isevenodd=0;
function BuildCircle(objname,label,desc){

	var circobj = document.createElement('div');
		circobj.setAttribute('id',objname);
		circobj.setAttribute('class','timeline-circ img-circle teal_bg');
		
		if(isevenodd%2 == 0){
			circobj.innerHTML='<div class="timeline-vr-top"><div class="timeline-enddot img-circle"></div><div class="timeline-desc">'+desc+'</div></div><label>'+label+'</label>';
		} else {
			circobj.innerHTML='<div class="timeline-vr-bottom"><div class="timeline-enddot img-circle"></div><div class="timeline-desc">'+desc+'</div></div><label>'+label+'</label>';
		}
		isevenodd++;
		
	return circobj;
}

