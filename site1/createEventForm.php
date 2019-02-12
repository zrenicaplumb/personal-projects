<form class="createEventForm" action="post" method="/api/createEvent" enctype="multipart/form-data">
      <button class="createEventBtn btn">
      <i class="fa fa-mail" data-help="createEvent"></i>
            Event Type
      <i class="fa fa-dropdown-arrow"></i>
      </button>
      <div class="eventTypeInputWrap">
      <label>Event Type</label>
      <select name="event_type">
            <option>Private</option>
            <option>Public</option>
      </select>
      </div>
      
      <div class="eventNameInputWrap">
      <label>Event Name</label>
      <input type="text" name="name" class="name"/>
      </div>

      <div class="locationInputWrap">
      <label>Location</label>
      <input type="text" name="location" class="location"/>
      </div> 

      <div class="dateInputWrap">
      <label>Date</label>
      <input type="date" name="date" class="date"/>
      </div>

      <div class="timeInputWrap">
      <label>Time</label>
      <input type="time" name="time" class="time"/>
      </div>

      <div class="descriptionInputWrap">
      <label>Description</label>
      <textarea placeholder="Tell more about the event" name="description"  class="description"></textarea>
      
      </div>
      <div class="imageInputWrap">
      <label>Images</label>
      <input type="file" placeholder="Tell more about the event" name="image"  class="eventImage"/>
      
      </div>
      <button class="btn createEventBtn">Create Event</button>
      <a class="btn closeEventPopup">Close</a>

</form>