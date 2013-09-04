<form class="bs-example"  method="post"  id="hotelSearchForm">
      <div class="form-group">
        <label class="control-label">Flight</label>
        <div class="controls">
          <input type="hidden" name="action"  value="getByRegion"/>
         
          <input type="text" name="search" placeholder="Flight" class="form-control" id="searchByDestination" autocomplete="off" value=""/> 
        </div>
      </div>
    
      <div class="form-group">
        <div class="controls">
          <button type="submit" class="btn btn-default" name="submit" id="searchHotels">Search </button>
        </div>
      </div>

</form> 