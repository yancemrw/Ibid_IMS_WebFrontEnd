<section class="section section-auction">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h2>Jadwal Lelang <span class="info-schedule"><i>i</i> Klik Kode Kota untuk Detail Lelang</span></h2>
            <div class="filter-schedule">
               <form class="form-inline">
                  <div class="form-group">
                     <label>Kota</label>
                     <select class="select-custom form-control">
                        <option value ="" >Bandung</option>
                        <option value ="" >Jakarta</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Jenis Barang </label>
                     <div class=" select-auctCategory">
                        <label class="car-type ">
                           <div class="ic ic-Mobil">
                           </div>
                           <input type="checkbox" class="checkbox-custom cursor-pointer" />
                           <span>Mobil</span>
                        </label>
                        <label class="motorcycle-type">
                           <div class=" ic ic-Motor">
                           </div>
                           <input type="checkbox" class="checkbox-custom cursor-pointer" />
                           <span>Motor</span>
                        </label>
                        <label class="hve-type">
                           <div class=" ic ic-HVE">
                           </div>
                           <input type="checkbox" class="checkbox-custom cursor-pointer" />
                           <span>HVE</span>
                        </label>
                        <label class="gadget-type">
                           <div class=" ic ic-Gadget">
                           </div>
                           <input type="checkbox" class="checkbox-custom cursor-pointer" />
                           <span>Gadget</span>
                        </label>
                     </div>
                  </div>
                  <button class="btn btn-green">Cari</button>
               </form>
            </div>
            <div id="calendar" class="action-schedule"></div>
         </div>
      </div>
   </div>
</section>

<div class="modal fade" id="modal-jadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">14 <span>Rabu</span></h4>
         </div>
         <div class="modal-body" align="center">
            <ul class="clearfix">
               <li >
                  <a href="" class="car-event"> <span>JKT T</span></a>
               </li>
               <li >
                  <a href="" class="car-event"> <span>JKT T</span></a>
               </li>
               <li >
                  <a href="" class="car-event"> <span>JKT T</span></a>
               </li>
               <li>
                  <a href="" class="motor-event"> <span>JKT T</span></a>
               </li>
               <li>
                  <a href="" class="motor-event"> <span>JKT T</span></a>
               </li>
               <li>
                  <a href="" class="motor-event"> <span>JKT T</span></a>
               </li>
               <li>
                  <a href="" class="hve-event"> <span>JKT T</span></a>
               </li>
               <li>
                  <a href="" class="hve-event"> <span>JKT T</span></a>
               </li>
               <li>
                  <a href="" class="hve-event"> <span>JKT T</span></a>
               </li>
               <li>
                  <a href="" class="gadget-event"> <span>JKT T</span></a>
               </li>
               <li>
                  <a href="" class="gadget-event"> <span>JKT T</span></a>
               </li>
               <li>
                  <a href="" class="gadget-event"> <span>JKT T</span></a>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>
<script src="<?php echo base_url(); ?>assetsfront/js/jquery.sticky.js"></script>
<script src="<?php echo base_url(); ?>assetsfront/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assetsfront/js/fullcalendar.min.js"></script>
<script>
   $(document).ready(function() {
   var even_cal = [{ 
           title: 'JKT T',
           start: '2017-11-10',
   
           end: '2017-11-10',
           allDay: false,
           className: 'car-event',
           tip: 'Personal tip 1'
           
       }, { 
           title: 'JKT T',
           start: '2017-11-10',
   
           end: '2017-11-10',
           allDay: false,
           className: 'car-event',
           
       }, { 
           title: 'JKT T',
          start: '2017-11-10',
   
           end: '2017-11-10',
           allDay: false,
           className: 'car-event',
           
       }, { 
           title: 'JKT T',
           start: '2017-11-10',
   
           end: '2017-11-10',
           allDay: false,
           className: 'car-event',
           
       }, {
           title: 'JKT S',
          start: '2017-11-10',
   
           end: '2017-11-10',
           allDay: false,
            className: 'motor-event',
       }, {
           title: 'JKT S',
          start: '2017-11-10',
   
           end: '2017-11-10',
           allDay: false,
            className: 'motor-event',
       }, {
           title: 'JKT S',
           start: '2017-11-10',
   
           end: '2017-11-10',
           allDay: false,
           className: 'motor-event',
       }, {
           title: 'JKT S',
           start: '2017-11-10',
   
           end: '2017-11-10',
           allDay: false,
            className: 'motor-event',
       }, {
           title: 'JKT S',
           start: '2017-11-10',
   
           end: '2017-11-10',
           allDay: false,
             className: 'hve-event',
       }, { 
           title: 'JKT T',
           start:'2017-11-03',
   
           end: '2017-11-03',
           allDay: false,
           className: 'car-event',
           
       }, { 
           title: 'JKT T',
          start: '2017-11-03',
   
           end: '2017-11-03',
           allDay: false,
           className: 'car-event',
           
       }, { 
           title: 'JKT T',
          start: '2017-11-03',
   
           end: '2017-11-03',
           allDay: false,
           className: 'car-event',
           
       }, { 
           title: 'JKT T',
          start: '2017-11-03',
   
           end: '2017-11-03',
           allDay: false,
           className: 'car-event',
           
       }, {
           title: 'JKT S',
          start: '2017-11-03',
   
           end: '2017-11-03',
           allDay: false,
            className: 'motor-event',
       }, {
           title: 'JKT S',
           start: '2017-11-03',
   
           end: '2017-11-10',
           allDay: false,
            className: 'motor-event',
       },{
           title: 'JKT S',
        start:'2017-11-03',
   
           end: '2017-11-03',
           allDay: false,
            className: 'motor-event',
       },{
           title: 'JKT S',
         start: '2017-11-03',
   
           end: '2017-11-03',
           allDay: false,
             className: 'hve-event',
       },
       {
           title: 'JKT T',
           start: '2017-11-24',
   
           end: '2017-11-24',
           allDay: false,
           className: 'gadget-event',
       },
       {
           title: 'JKT T',
           start: '2017-11-24',
   
           end: '2017-11-24',
           allDay: false,
           className: 'gadget-event',
       },
       {
           title: 'JKT T',
           start: '2017-11-24',
   
           end: '2017-11-24',
           allDay: false,
           className: 'gadget-event',
       }];
   
   $('#calendar').fullCalendar({
       header: {
           left: 'prev,next today',
           center: 'title',
           right: 'month,agendaWeek,agendaDay,listMonth'
       },
       height:'auto',
       defaultDate: '2017-11-12',
       navLinks: true, // can click day/week names to navigate views
       businessHours: true, // display business hours
       editable: false,
       events: even_cal,
       dayRender: function(date, cell){
         var parseDate = moment(cell.attr("data-date")).format('dddd');
         $("td.fc-day-top[data-date='" + cell.attr("data-date") + "']").append("<span>" + parseDate + "</span>");
         $("td.fc-day-top[data-date='" + cell.attr("data-date") + "']").append("<a class='link' data-toggle='modal' data-target='#modal-jadwal'>Selengkapnya</a>");
           $("td.fc-day.fc-widget-content[data-date='" + cell.attr("data-date") + "']").append("<a class='link' data-toggle='modal' data-target='#modal-jadwal'>Selengkapnya</a>")
       },
       eventRender: function(event, element) {
        element.attr('title', event.tip);
         var dataToFind = moment(event.start).format('YYYY-MM-DD');
         $("td[data-date='" + dataToFind + "']").append(element);
   
       },
       eventAfterAllRender: function(view) {
         $("td.fc-event-container").find("a").remove()
       }
   });
      
   });
   
   function getDates(startDate, endDate) {
   var now = startDate,
   dates = [];
   
   while (now.format('YYYY-MM-DD') <= endDate.format('YYYY-MM-DD')) {
   dates.push(now.format('YYYY-MM-DD'));
   now.add('days', 1);
   }
   return dates;
   };
   
   $(document).ready(function(){
   $("nav").sticky({
       topSpacing:0
   });
   
   $(".select-custom").select2({
       minimumResultsForSearch: -1
   });
   
    $('#toggle-nav').click(function(){
          $('.navbar-collapse.collapse').toggleClass('open')
        })
        $('.nav-close').click(function(){
          $('.navbar-collapse.collapse').toggleClass('open')
        })
    
        $('.lang-mob a').click(function(){
          $('.help-mob ul').removeClass('open')
          $(this).toggleClass('opened')
          $(this).siblings('ul').toggleClass('open')
        })
        $('.help-mob a').click(function(){
          $('.lang-mob ul').removeClass('open')
          $(this).toggleClass('opened')
          $(this).siblings('ul').toggleClass('open')
        })
   
   });
</script>