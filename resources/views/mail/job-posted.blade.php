<h2>{{ $job->title }}</h2>

<div>
    Congratulations! Your job has been posted successfully.
</div>
<p> 
    <a href="{{ url('/jobs/' . $job->id) }}">View Job Listing</a>   
</p>
