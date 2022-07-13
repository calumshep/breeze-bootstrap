@extends('layouts.app')

@section('content')

<div class="row mb-4 align-items-center">
	<div class="col-md-6">
		<p>
			Welcome to Scottish Ski Club's training management system. You can book yourself or any of your
			trainees into the upcoming sessions below. To book a particular session, select "More details"
			below the session you wish to book, where you can then select who you want to book in to it. You
			must have enough credit in your account to do so.
		</p>
	</div>

	<div class="col-md-6">
		<div class="card mb-3">
			<div class="card-body">
				<p class="card-text fs-3"><strong>Your credits:&nbsp;</strong>250</p>
				<a href="#" class="btn btn-primary btn-lg">Add credit</a>
				<a href="#" class="btn btn-secondary btn-lg">Transaction history</a>
			</div>
		</div>
	</div>
</div>

<h1 class="text-center">Upcoming Sessions</h1>

<h2>Saturday, 16th July, 2022</h2>

<div class="card mb-3">
	<div class="row g-0">
		<div class="col-md-3">
			<img src="https://via.placeholder.com/400" class="img-fluid" alt="Placeholder image">
		</div>
		<div class="col-md-9">
			<div class="card-body">
				<h3 class="card-title">Weekend Snow Training</h3>
				<p class="card-text">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur.
				</p>
				<p class="card-text"><strong>Cost:&nbsp;</strong> 40 credits</p>
				<a href="#" class="btn btn-primary btn-lg">
					More details &raquo;
				</a>
			</div>
		</div>
	</div>
</div>

<div class="card mb-3">
	<div class="row g-0">
		<div class="col-md-3">
			<img src="https://via.placeholder.com/400" class="img-fluid" alt="Placeholder image">
		</div>
		<div class="col-md-9">
			<div class="card-body">
				<h3 class="card-title">Fitness Session</h3>
				<p class="card-text">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation.
				</p>
				<p class="card-text"><strong>Cost:&nbsp;</strong> 15 credits</p>
				<a href="#" class="btn btn-primary btn-lg">
					More details &raquo;
				</a>
			</div>
		</div>
	</div>
</div>

<h2>Sunday, 17th July, 2022</h2>

<div class="card mb-3">
	<div class="row g-0">
		<div class="col-md-3">
			<img src="https://via.placeholder.com/400" class="img-fluid" alt="Placeholder image">
		</div>
		<div class="col-md-9">
			<div class="card-body">
				<h3 class="card-title">Weekend Snow Training</h3>
				<p class="card-text">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur.
				</p>
				<p class="card-text"><strong>Cost:&nbsp;</strong> 40 credits</p>
				<a href="#" class="btn btn-primary btn-lg">
					More details &raquo;
				</a>
			</div>
		</div>
	</div>
</div>

<nav>
  <ul class="pagination pagination-lg justify-content-center">
    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
    <li class="page-item active"><span class="page-link">1</span></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

@endsection
