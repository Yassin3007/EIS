<style >
  table.blueTable {
  border: 1px solid #947C4E;
  width: 100%;
  height: 60px;
  text-align: center;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
  font-weight: bold;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #947C4E;
  background: -moz-linear-gradient(top, #af9d7a 0%, #9e895f 66%, #947C4E 100%);
  background: -webkit-linear-gradient(top, #af9d7a 0%, #9e895f 66%, #947C4E 100%);
  background: linear-gradient(to bottom, #af9d7a 0%, #9e895f 66%, #947C4E 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  text-align: center;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}
</style>

<table class="blueTable">
  <thead>
  <tr>
  <th>Name</th>
  <th>Email</th>
  <th>Phone</th>
  <th>Job title</th>
  <th>Message</th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <td>{{$details['name']}}</td><td>{{$details['email']}}</td><td>{{$details['phone']}}</td><td>{{$details['job_title']}}</td><td>{{$details['message']}} </td></tr>
  </tbody>
  </tr>
</table>


{{-- <div class="container table-responsive py-5">
  <table class="table table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">phone</th>
        <th scope="col">job title</th>
        <th scope="col">message</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$details['name']}} </td>
        <td>{{$details['email']}} </td>
        <td>{{$details['phone']}} </td>
        <td>{{$details['job_title']}} </td>
        <td>{{$details['message']}} </td>
      </tr>
    </tbody>
  </table>
  </div> --}}


{{--
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">messages from website</h3>
      </div>
      <div class="card-body">
        <table id="tableContainer"  class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <th>name</th>
              <th>email</th>
              <th>phone</th>
              <th>job title </th>
              <th>message </th>

            </tr>
          </thead>
          <tbody>

                <td>{{$details['name']}} </td>
                <td>{{$details['email']}} </td>
                <td>{{$details['phone']}} </td>
                <td>{{$details['job_title']}} </td>
                <td>{{$details['message']}} </td>

            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
 --}}
