 <ul class="navbar-nav sidebar sidebar-light accordion " id="accordionSidebar">
     <a class="sidebar-brand d-flex align-items-center bg-gradient-primary  justify-content-center" href="index.php">
         <div class="sidebar-brand-icon">
             <img src="img/logo/attnlg.jpg">
         </div>
         <div class="sidebar-brand-text mx-3">DIGI-CAMPUS</div>
     </a>
     <hr class="sidebar-divider my-0">
     <li class="nav-item active">
         <a class="nav-link" href="index.php">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Schedule
     </div>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap35" aria-expanded="true" aria-controls="collapseBootstrap">
             <i class="fas fa-chalkboard"></i>
             <span>TimeTable</span>
         </a>
         <div id="collapseBootstrap35" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Time Table</h6>
                    <a class="collapse-item" href="insert_timetable.php">Create Time Table</a>
                 <a class="collapse-item" href="view_timetable.php">Today's Time Table</a>
                       <a class="collapse-item" href="entiretimetable.php">Weekly Time Table</a>
                          
                 <!-- <a class="collapse-item" href="#">Member List</a> -->
             </div>
         </div>
     </li>
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Class and Class Dept
     </div>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
             <i class="fas fa-chalkboard"></i>
             <span>Manage Classes</span>
         </a>
         <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Manage Classes</h6>
                 <a class="collapse-item" href="createClass.php">Create Class</a>
                 <!-- <a class="collapse-item" href="#">Member List</a> -->
             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapusers" aria-expanded="true" aria-controls="collapseBootstrapusers">
             <i class="fas fa-code-branch"></i>
             <span>Manage Class Dept</span>
         </a>
         <div id="collapseBootstrapusers" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Manage Class Dept</h6>
                 <a class="collapse-item" href="createClassArms.php">Create Class Dept</a>
                 <!-- <a class="collapse-item" href="usersList.php">User List</a> -->
             </div>
         </div>
     </li>
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Teachers
     </div>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapassests" aria-expanded="true" aria-controls="collapseBootstrapassests">
             <i class="fas fa-chalkboard-teacher"></i>
             <span>Manage Teachers</span>
         </a>
         <div id="collapseBootstrapassests" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Manage Class Teachers</h6>
                 <a class="collapse-item" href="createClassTeacher.php">Create Class Teachers</a>
                 <!-- <a class="collapse-item" href="assetsCategoryList.php">Assets Category List</a>
             <a class="collapse-item" href="createAssets.php">Create Assets</a> -->
             </div>
         </div>
     </li>
     <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapschemes"
          aria-expanded="true" aria-controls="collapseBootstrapschemes">
          <i class="fas fa-home"></i>
          <span>Manage Schemes</span>
        </a>
        <div id="collapseBootstrapschemes" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Schemes</h6>
             <a class="collapse-item" href="createSchemes.php">Create Scheme</a>
            <a class="collapse-item" href="schemeList.php">Scheme List</a>
          </div>
        </div>
      </li> -->

     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Students
     </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2" aria-expanded="true" aria-controls="collapseBootstrap2">
             <i class="fas fa-user-graduate"></i>
             <span>Manage Students</span>
         </a>
         <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Manage Students</h6>
                 <a class="collapse-item" href="createStudents.php">Create Students</a>
                 <!-- <a class="collapse-item" href="#">Assets Type</a> -->
             </div>
         </div>
     </li>

     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Session & Term
     </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapcon" aria-expanded="true" aria-controls="collapseBootstrapcon">
             <i class="fa fa-calendar-alt"></i>
             <span>Manage Session & Term</span>
         </a>
         <div id="collapseBootstrapcon" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Contribution</h6>
                 <a class="collapse-item" href="createSessionTerm.php">Create Session and Term</a>
                 <!-- <a class="collapse-item" href="addMemberToContLevel.php ">Add Member to Level</a> -->
             </div>
         </div>
     </li>

     

     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Manage Resources
     </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapcon1" aria-expanded="true" aria-controls="collapseBootstrapcon1">
             <i class="fas Resources"></i>
             <span>Track Resources</span>
         </a>
         <div id="collapseBootstrapcon1" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Contribution</h6>
                 <a class="collapse-item" href="demo.php">View Available Resources</a>
                 <a class="collapse-item" href="demo_add.php">Add new Resources</a>
                  <a class="collapse-item" href="chart.php">Resource Analysis</a>
                                 <!-- <a class="collapse-item" href="addMemberToContLevel.php ">Add Member to Level</a> -->
             </div>
         </div>
     </li>

    <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Notice
     </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapcon3" aria-expanded="true" aria-controls="collapseBootstrapcon3">
             <i class="fas Notice"></i>
             <span>Notice </span>
         </a>
         <div id="collapseBootstrapcon3" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Contribution</h6>
                 
                  <a class="collapse-item" href="not.php">Add Notice</a>
                <a class="collapse-item" href="display.php">View Notice</a>
                
                
                
                 <!-- <a class="collapse-item" href="addMemberToContLevel.php ">Add Member to Level</a> -->
             </div>
         </div>
     </li>
     

     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Placement Cell
     </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapcon5" aria-expanded="true" aria-controls="collapseBootstrapcon5">
             <i class="fas placement"></i>
             <span>Track Placements</span>
         </a>
         <div id="collapseBootstrapcon5" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Contribution</h6>
                 
                  <a class="collapse-item" href="P-dashboard1.php">Placements Statistics</a>
                 <a class="collapse-item" href="P-ActiveJobs.php">Active Drives</a>
                 <a class="collapse-item" href="P-addJobs.php">Add Drives</a>
                  <a class="collapse-item" href="P-Application.php">Students Profiles</a>
                 <!-- <a class="collapse-item" href="P-companies.php">Co-Ordinators</a> -->
                
                 <!-- <a class="collapse-item" href="addMemberToContLevel.php ">Add Member to Level</a> -->
             </div>
         </div>
     </li>
   
     <hr class="sidebar-divider">

 </ul>