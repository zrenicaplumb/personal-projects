<form class="createEventForm" action="post" method="/api/createEvent" enctype="multipart/form-data">
      <div class="eventUserEmailWrap">
            <input type="hidden" name="eventUserEmail" class="eventUserEmail"/>
      </div>

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

      <div class="eventTagsWrap">
            <label>Tags</label>
            <input type="text" name="tags" class="tags"/>
      </div>

      <div class="inviteListWrap">
            <label>Invite List</label>
            <input type="text" name="inviteList" class="inviteList"/>
      </div>

      <div class="imageInputWrap">
            <label>Images</label>
            <input type="file" placeholder="Tell more about the event" name="image"  class="eventImage"/>
            
      </div>
      <button class="btn createEventBtn">Create Event</button>
      <a class="btn closeEventPopup">Close</a>

</form>