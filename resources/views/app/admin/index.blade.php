@extends('app.admin.layouts.master')

@section('content')
	@include('app.admin.partials.dashboard')
@endsection

@section('scripts')
	<!-- Charts JS
	============================================= -->
	<script src="/js/chart.js"></script>
	<script src="/js/chart-utils.js"></script>

	<script>

		var presets = window.chartColors;
		var utils = Samples.utils;
		var inputs = {
			min: -100,
			max: 100,
			count: 8,
			decimals: 2,
			continuity: 1
		};

		function generateData(config) {
			return utils.numbers(utils.merge(inputs, config || {}));
		}

		function generateLabels(config) {
			return utils.months(utils.merge({
				count: inputs.count,
				section: 3
			}, config || {}));
		}

		var options = {
			maintainAspectRatio: false,
			spanGaps: false,
			elements: {
				line: {
					tension: 0.000001
				}
			},
			plugins: {
				filler: {
					propagate: false
				}
			},
			scales: {
				xAxes: [{
					ticks: {
						autoSkip: false,
						maxRotation: 0
					}
				}]
			}
		};

		[false, 'origin', 'start', 'end'].forEach(function(boundary, index) {

			// reset the random seed to generate the same data for all charts
			utils.srand(8);

			new Chart('chart-' + index, {
				type: 'line',
				data: {
					labels: generateLabels(),
					datasets: [{
						backgroundColor: utils.transparentize(presets.green),
						borderColor: presets.green,
						data: generateData(),
						label: 'Dataset',
						fill: boundary
					}]
				},
				options: utils.merge(options, {
					title: {
						text: 'fill: ' + boundary,
						display: true
					}
				})
			});
		});


		function toggleSmooth(btn) {
			var value = btn.classList.toggle('btn-on');
			Chart.helpers.each(Chart.instances, function(chart) {
				chart.options.elements.line.tension = value? 0.4 : 0.000001;
				chart.update();
			});
		}

		function randomize() {
			var seed = utils.rand();
			Chart.helpers.each(Chart.instances, function(chart) {
				utils.srand(seed);

				chart.data.datasets.forEach(function(dataset) {
					dataset.data = generateData();
				});

				chart.update();
			});
		}

	</script>
@endsection