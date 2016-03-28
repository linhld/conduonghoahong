<?php
	//if User sharing this sets, add to Share Area
	Event::listen('set.addToShare', function($data)
	{
		//Add to Shared Set for community

	});

	//if User create new set
	Event::listen('set.createNewSet', function($data)
	{
		//Add to Shared Set for community

	});

	//Event for Leaning stored in session
	Event::listen('set.learnStart', function($data)
	{

	});

	//Event for Leaning stored in session
	Event::listen('set.learnFinish', function($data)
	{

	});

