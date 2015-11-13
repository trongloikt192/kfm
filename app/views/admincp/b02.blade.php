@extends('admincp.layouts_admincp.master')

@section('title')
	Dashboard
@stop

@section('content')
    <div class="fluid">

        <div class="widget grid6">
            <div class="widget-header">
                <div class="widget-title">
                    <i class="fa fa-comments"></i> Recent Questions
                </div>
                <div class="widget-controls">
                    <div class="badge msg-badge">34</div>
                </div>
            </div> <!-- /widget-header -->
            
            <!-- GOOGLE ANALYTICS -->
            <button id="auth-button" hidden>Authorize</button>

            <h1>Hello Analytics</h1>
            
            <textarea cols="80" rows="20" id="query-output"></textarea>
            <!-- /END GOOGLE ANALYTICS -->
            
            <hr>

            <div class="pag pag-mini">
              <ul class="pagination">
                <li class="disabled"><a href="#" onclick="return false;"><i class="fa fa-caret-left"></i></a></li>
                <li class="active"><a href="#" onclick="return false;">1</a></li>
                <li><a href="#" onclick="return false;">2</a></li>
                <li><a href="#" onclick="return false;">3</a></li>
                <li><a href="#" onclick="return false;">4</a></li>
                <li><a href="#" onclick="return false;">5</a></li>
                <li class="disabled period"><a href="#" onclick="return false;">...</a></li>
                <li><a href="#" onclick="return false;">25</a></li>
                <li><a href="#" onclick="return false;"><i class="fa fa-caret-right"></i></a></li>
              </ul>
              <button class="btn btn-blue">View All</button>
            </div>
            
            
            
        </div> <!-- /widget -->

        <div class="widget grid6">
            <div class="widget-header">
                <div class="widget-title">
                    <i class="fa fa-pencil"></i> Contact
                </div>
                <div class="widget-controls">
                    <input type="checkbox" id="switch-form" />
                </div>
            </div> <!-- /widget-header -->
            
            <div class="widget-content clearauto">
                <input type="text" placeholder="Email title">
                <textarea placeholder="Content" ></textarea>
                <button class="btn btn-blue pull-right" type="submit">Sent</button>
            </div>

        </div> <!-- /widget -->

    </div> <!-- /fluid -->


@stop

@section('scripts')
    <script>

      // Replace with your client ID from the developer console.
      var CLIENT_ID = '233898570235-rkilmda98uap7qun09ivr14uhef9d5b3.apps.googleusercontent.com';
    
      // Set authorized scope.
      var SCOPES = ['https://www.googleapis.com/auth/analytics.readonly'];
    
    
      function authorize(event) {
        // Handles the authorization flow.
        // `immediate` should be false when invoked from the button click.
        var useImmdiate = event ? false : true;
        var authData = {
          client_id: CLIENT_ID,
          scope: SCOPES,
          immediate: useImmdiate
        };
    
        gapi.auth.authorize(authData, function(response) {
          var authButton = document.getElementById('auth-button');
          if (response.error) {
            authButton.hidden = false;
          }
          else {
            authButton.hidden = true;
            queryAccounts();
          }
        });
      }
    
    
    function queryAccounts() {
      // Load the Google Analytics client library.
      gapi.client.load('analytics', 'v3').then(function() {
    
        // Get a list of all Google Analytics accounts for this user
        gapi.client.analytics.management.accounts.list().then(handleAccounts);
      });
    }
    
    
    function handleAccounts(response) {
      // Handles the response from the accounts list method.
      if (response.result.items && response.result.items.length) {
        // Get the first Google Analytics account.
        var firstAccountId = response.result.items[0].id;
    
        // Query for properties.
        queryProperties(firstAccountId);
      } else {
        console.log('No accounts found for this user.');
      }
    }
    
    
    function queryProperties(accountId) {
      // Get a list of all the properties for the account.
      gapi.client.analytics.management.webproperties.list(
          {'accountId': accountId})
        .then(handleProperties)
        .then(null, function(err) {
          // Log any errors.
          console.log(err);
      });
    }
    
    
    function handleProperties(response) {
      // Handles the response from the webproperties list method.
      if (response.result.items && response.result.items.length) {
    
        // Get the first Google Analytics account
        var firstAccountId = response.result.items[0].accountId;
    
        // Get the first property ID
        var firstPropertyId = response.result.items[0].id;
    
        // Query for Views (Profiles).
        queryProfiles(firstAccountId, firstPropertyId);
      } else {
        console.log('No properties found for this user.');
      }
    }
    
    
    function queryProfiles(accountId, propertyId) {
      // Get a list of all Views (Profiles) for the first property
      // of the first Account.
      gapi.client.analytics.management.profiles.list({
          'accountId': accountId,
          'webPropertyId': propertyId
      })
      .then(handleProfiles)
      .then(null, function(err) {
          // Log any errors.
          console.log(err);
      });
    }
    
    
    function handleProfiles(response) {
      // Handles the response from the profiles list method.
      if (response.result.items && response.result.items.length) {
        // Get the first View (Profile) ID.
        var firstProfileId = response.result.items[0].id;
    
        // Query the Core Reporting API.
        queryCoreReportingApi(firstProfileId);
      } else {
        console.log('No views (profiles) found for this user.');
      }
    }
    
    
    function queryCoreReportingApi(profileId) {
      // Query the Core Reporting API for the number sessions for
      // the past seven days.
      gapi.client.analytics.data.ga.get({
        'ids': 'ga:' + profileId,
        'start-date': '7daysAgo',
        'end-date': 'today',
        'metrics': 'ga:sessions'
      })
      .then(function(response) {
        var formattedJson = JSON.stringify(response.result, null, 2);
        document.getElementById('query-output').value = formattedJson;
      })
      .then(null, function(err) {
          // Log any errors.
          console.log(err);
      });
    }
    
      // Add an event listener to the 'auth-button'.
      document.getElementById('auth-button').addEventListener('click', authorize);
    </script>
    
    <script src="https://apis.google.com/js/client.js?onload=authorize"></script>
@stop




