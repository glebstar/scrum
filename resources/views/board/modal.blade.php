<div class="modal fade" tabindex="-1" role="dialog" id="card-display">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-left card-number-modal"></h4>
        <h4 class="modal-title text-center card-title-modal"></h4>
        <input class="card-name hidden" type="text" value="Card Name">
      </div>
      <div class="modal-body">
        <div class="input-field" id="members-dropdown" data-card-id="" data-project-id="{{ $projectId }}">
	        <div class="members-list members-dp">
			</div>
			<div class="inputs">
			</div>
		    <label class="member-label">Members</label>
	    </div>
	    <div class="input-field col s12">
	    	<div class='input-group date'>
                <input id="datetimepicker1" type="text">
            </div>
	    </div>

	    <div class="input-field col s12" id="priority">
		    <select>
		      <option value="0" selected>N/A</option>
		      <option value="1">Yes</option>
		    </select>
		    <label>Priority</label>
	    </div>

	    <div class="input-field col s12">
	    	<p class="weight">Weight</p>
		    <p class="range-field">
		      <input type="range" id="test5" min="0" max="100" />
		    </p>
	    </div>

	    <div class="comment-section">
	    	<h5>Comments <span class="glyphicon glyphicon-comment" aria-hidden="true"></span></h5>

	    	<div class="comments-list">
	    	</div>
	    	<div class="add-comment">
	    		<div class="members-list">
					<span class="member" title="{{ \Auth::user()->name }}">{{ substr(\Auth::user()->name, 0, 1) }}</span>
				</div>
	    		<textarea></textarea>
	    		<button id="add-comment">Add comment</button>
	    	</div>
	    </div>
		<div class="backlog-button">
	    	<button class="btn btn-info" id="to-backlog-btn" style="margin-top: 20px;">To Backlog</button>
	    </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->