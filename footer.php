<style>
.user-pic {
    width: 150px;
    height: 150px;
    overflow: hidden;
    border-radius: 100%;
    margin: 20px auto 20px;
    border-left: 3px solid #ddd;
    border-right: 3px solid #ddd;
    border-top: 3px solid #007bff;
    border-bottom: 3px solid #007bff;
    transform: rotate(-30deg);
    transition: 0.5s;
}
.card-box:hover .user-pic {
    transform: rotate(0deg);
    transform: scale(1.1);
}
.card-box {
    padding: 15px;
    background-color: #fdfdfd;
    margin: 20px 0px;
    border-radius: 10px;
    border: 1px solid #eee;
    box-shadow: 0px 0px 8px 0px #d4d4d4;
    transition: 0.5s;
}
.card-box:hover {
	border: 1px solid #007bff;
}
.card-box p {
    color: #808080;
}
.col-sm-6{
	width: 100%;
}
</style>

	<div class="container">
		<div class="row">
			<div class="col-sm-6 offset-sm-3 mt-4 mb-4">
				<h2 class="text-center">Our Team</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="card-box text-center">
					<!-- <div class="user-pic">
						<img src="../css/test.jpg" class="img-fluid" alt="User Pic">
					</div> -->
					<h4>Τσιντζέλης Δημήτριος</h4>
					<h6>1067370</h6>
					<hr>
					<p>He is a fourth year student at the Department of Computer Engineering and Informatics of Patras</p>
					<hr>
					<a href="#" class="btn btn-primary">Know More</a>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card-box text-center">
					<!-- <div class="user-pic">
						<img src="../css/test.jpg" class="img-fluid" alt="User Pic">
					</div> -->
					<h4>Σεκλειζιώτης Βασίλειος</h4>
					<h6>1067513</h6>
					<hr>
					<p>He is a fourth year student at the Department of Computer Engineering and Informatics of Patras</p>
					<hr>
					<a href="#" class="btn btn-primary">Know More</a>
				</div> 
			</div>

			<div class="col-md-4">
				<div class="card-box text-center">
					<!-- <div class="user-pic">
						<img src="../css/test.jpg" class="img-fluid" alt="User Pic">
					</div> -->
						<h4>Μητρομάρας Γεώργιος</h4>
					<h6>1070907</h6>
					<hr>
					<p>He is a fourth year student at the Department of Computer Engineering and Informatics of Patras</p>
					<hr>
					<a href="#" class="btn btn-primary">Know More</a>
				</div>
			</div>
		</div>
	</div>