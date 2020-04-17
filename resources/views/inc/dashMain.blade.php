<div>
	<p @if($k < 0)
		style="color: red"
	@endif>В кассе - {{ $k }}</p>
</div>

<div>
	<p @if($income < 0)
		style="color: red"
	@endif>Доходы за месяц - {{ $income }}</p>
</div>

<div>
	<p @if($exes < 0)
		style="color: red"
	@endif>Расходы за месяц - {{ $exes }}</p>
</div>

<div>
	<p @if($profit < 0)
		style="color: red"
	@endif>Прибыль за месяц - {{ $profit }}</p>
</div>

<div>
	<p @if($salary < 0)
		style="color: red"
	@endif>ЗП за месяц - {{ $salary }}</p>
</div>

<div>
	<p @if($exes/date("t") > $income/date("t"))
		style="color: red"
	@endif>Точка безубыточности (в день) - {{ ceil($exes/date("t")) }}р/{{ round($income/date("t")) }}р</p>
</div>