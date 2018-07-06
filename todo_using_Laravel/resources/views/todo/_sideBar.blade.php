<div class="sideWrapper">
        <aside class="aside">
                 <div><span>Task Categorization</span></div>
                 <a href="{{ action('TodosController@getCompleted')}}"><i class="fa fa-check "></i> Completed Tasks</a>
                 <a href="{{ action('TodosController@getProcessing') }}"><i class="fa fa-spinner "></i> Processing Tasks</a>
                 <a href="{{ action('TodosController@getPending') }}"><i class="fa fa-hourglass-end "></i> Pending Tasks</a>
                 <a href="/"><i class="fa fa-calendar text-muted"></i> All Task</a>
                 <hr>
                 <a href="{{ action('TodosController@sortByTitle') }}"><i class="fa fa-sort-alpha-asc"></i> Sort By Title</a>
                 <a href="{{ action('TodosController@sortByDate') }}"><i class="fa fa-sort-amount-desc"></i> Sort By Date</a>
                 <hr>
                 <a href="{{ action('TodosController@create') }}"><i class="fa fa-plus"></i> Quick Add</a>
                 <a href="{{ action('TodosController@search') }}"><i class="fa fa-search "></i> Quick Find</a>
                  <form action="{{ action('TodosController@clearall')}}" onSubmit="if(!confirm('Are you sure you want to permanently delete all the tasks?')){return false;}" > 
                        <button type="submit" id="quickClear">
                                <i class="fa fa-trash text-danger"></i> Quick Clear
                        </button>
                 </form>
                 <hr>
                 <a href="{{ action('TodosController@help') }}"><i class="fa fa-question-circle text-primary"></i> Help Desk</a>
        </aside>
</div>