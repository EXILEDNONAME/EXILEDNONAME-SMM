@extends('layouts.backend.default', ['page' => 'dashboard'])
@section('title', 'Dashboard')

@section('content')
@if ($message = Session::get('success'))
<div id="toast-container" class="toast-bottom-right">
  <div class="toast toast-success" aria-live="polite">
    <div class="toast-message">{{ $message }}</div>
  </div>
</div>
@endif

@if ($message = Session::get('error'))
<div id="toast-container" class="toast-bottom-right">
  <div class="toast toast-error" aria-live="polite">
    <div class="toast-message">{{ $message }}</div>
  </div>
</div>
@endif

<div class="row">

  <div class="col-xl-6">
    <div class="card card-custom card-stretch gutter-b">
      <div class="card-body d-flex align-items-center py-0 mt-2">
        <div class="d-flex flex-column flex-grow-1 py-lg-5">
          <a class="card-title font-weight-bolder text-dark-75 mb-2 text-hover-danger"> Welcome, {{ Auth::User()->name }} </a>
          <span class="text-muted">
            <span id="fullyear"> {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y'); }} </span>
            <span id="hours">00</span>:<span id="minutes">00</span>:<span id="seconds">00</span> <span id="amOrpm"></span>
          </span>
        </div>
        <img src="/assets/backend/media/svg/avatars/029-boy-11.svg" alt="" class="align-self-end h-100px">
      </div>
    </div>
  </div>

  <div class="col-xl-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b">
      <div class="card-body">
        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block text-center"> {{ \DB::table('users')->count() }} </span>
        <span class="font-weight-bold text-muted font-size-sm"><center> Total Users </center></span>
      </div>
    </div>
  </div>

  <div class="col-xl-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b">
      <div class="card-body">
        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block text-center"> {{ \DB::table('sessions')->count() }} </span>
        <span class="font-weight-bold text-muted font-size-sm"><center> Sessions </center></span>
      </div>
    </div>
  </div>

</div>


<div class="col-lg-6">
        <!--begin::Example-->
        <!--begin::Card-->
        <div class="card card-custom" data-card="true" id="kt_card_1">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Card Tools</h3>
                </div>
				<div class="card-toolbar">
					<a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Toggle Card">
						<i class="ki ki-arrow-down icon-nm"></i>
					</a>
                    <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="reload" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reload Card">
						<i class="ki ki-reload icon-nm"></i>
					</a>
                    <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary" data-card-tool="remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Card">
						<i class="ki ki-close icon-nm"></i>
					</a>
				</div>
            </div>
            <div class="card-body">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled.
                </p>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled.
                </p>
            </div>
        </div>
        <!--end::Card-->

        <!--begin: Code-->
        <div class="example example-compact mt-2 gutter-b">
            <div class="example-tools">
                <span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
            </div>
            <div class="example-code">
                <ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#example_code_html">HTML</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#example_code_js">JS</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="example_code_html" role="tabpanel">
                        <div class="example-highlight"><pre style="height:300px" class=" language-html"><code class=" language-html"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>card card-custom<span class="token punctuation">"</span></span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>kt_card_1<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
	<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>card-header<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
		<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>card-title<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>card-label<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Card Title<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
		<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
		<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>card-toolbar<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>#<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>btn btn-icon btn-sm btn-hover-light-primary mr-1<span class="token punctuation">"</span></span> <span class="token attr-name">data-card-tool</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>toggle<span class="token punctuation">"</span></span> <span class="token attr-name">data-toggle</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>tooltip<span class="token punctuation">"</span></span> <span class="token attr-name">data-placement</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>top<span class="token punctuation">"</span></span> <span class="token attr-name">title</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>Toggle Card<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>ki ki-arrow-down icon-nm<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>#<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>btn btn-icon btn-sm btn-hover-light-primary mr-1<span class="token punctuation">"</span></span> <span class="token attr-name">data-card-tool</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>reload<span class="token punctuation">"</span></span> <span class="token attr-name">data-toggle</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>tooltip<span class="token punctuation">"</span></span> <span class="token attr-name">data-placement</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>top<span class="token punctuation">"</span></span> <span class="token attr-name">title</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>Reload Card<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>ki ki-reload icon-nm<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>#<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>btn btn-icon btn-sm btn-hover-light-primary<span class="token punctuation">"</span></span> <span class="token attr-name">data-card-tool</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>remove<span class="token punctuation">"</span></span> <span class="token attr-name">data-toggle</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>tooltip<span class="token punctuation">"</span></span> <span class="token attr-name">data-placement</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>top<span class="token punctuation">"</span></span> <span class="token attr-name">title</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>Remove Card<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>ki ki-close icon-nm<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span>
		<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
	<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
	<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>card-body<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
		...
	<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span></code></pre></div>                    </div>
                    <div class="tab-pane" id="example_code_js">
                        <div class="example-highlight"><pre style="height:300px" class=" language-js"><code class=" language-js"><span class="token comment">// This card is lazy initialized using data-card="true" attribute. You can access to the card object as shown below and override its behavior</span>
<span class="token keyword">var</span> card <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">KTCard</span><span class="token punctuation">(</span><span class="token string">'kt_card_1'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token comment">// Toggle event handlers</span>
card<span class="token punctuation">.</span><span class="token function">on</span><span class="token punctuation">(</span><span class="token string">'beforeCollapse'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token parameter">card</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
	<span class="token function">setTimeout</span><span class="token punctuation">(</span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
		toastr<span class="token punctuation">.</span><span class="token function">info</span><span class="token punctuation">(</span><span class="token string">'Before collapse event fired!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
	<span class="token punctuation">}</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

card<span class="token punctuation">.</span><span class="token function">on</span><span class="token punctuation">(</span><span class="token string">'afterCollapse'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token parameter">card</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
	<span class="token function">setTimeout</span><span class="token punctuation">(</span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
		toastr<span class="token punctuation">.</span><span class="token function">warning</span><span class="token punctuation">(</span><span class="token string">'Before collapse event fired!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
	<span class="token punctuation">}</span><span class="token punctuation">,</span> <span class="token number">2000</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

card<span class="token punctuation">.</span><span class="token function">on</span><span class="token punctuation">(</span><span class="token string">'beforeExpand'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token parameter">card</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
	<span class="token function">setTimeout</span><span class="token punctuation">(</span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
		toastr<span class="token punctuation">.</span><span class="token function">info</span><span class="token punctuation">(</span><span class="token string">'Before expand event fired!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
	<span class="token punctuation">}</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

card<span class="token punctuation">.</span><span class="token function">on</span><span class="token punctuation">(</span><span class="token string">'afterExpand'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token parameter">card</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
	<span class="token function">setTimeout</span><span class="token punctuation">(</span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
		toastr<span class="token punctuation">.</span><span class="token function">warning</span><span class="token punctuation">(</span><span class="token string">'After expand event fired!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
	<span class="token punctuation">}</span><span class="token punctuation">,</span> <span class="token number">2000</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token comment">// Remove event handlers</span>
card<span class="token punctuation">.</span><span class="token function">on</span><span class="token punctuation">(</span><span class="token string">'beforeRemove'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token parameter">card</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
	toastr<span class="token punctuation">.</span><span class="token function">info</span><span class="token punctuation">(</span><span class="token string">'Before remove event fired!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

	<span class="token keyword">return</span> <span class="token function">confirm</span><span class="token punctuation">(</span><span class="token string">'Are you sure to remove this card ?'</span><span class="token punctuation">)</span><span class="token punctuation">;</span> <span class="token comment">// remove card after user confirmation</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

card<span class="token punctuation">.</span><span class="token function">on</span><span class="token punctuation">(</span><span class="token string">'afterRemove'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token parameter">card</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
	<span class="token function">setTimeout</span><span class="token punctuation">(</span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
		toastr<span class="token punctuation">.</span><span class="token function">warning</span><span class="token punctuation">(</span><span class="token string">'After remove event fired!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
	<span class="token punctuation">}</span><span class="token punctuation">,</span> <span class="token number">2000</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token comment">// Reload event handlers</span>
card<span class="token punctuation">.</span><span class="token function">on</span><span class="token punctuation">(</span><span class="token string">'reload'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token parameter">card</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
	toastr<span class="token punctuation">.</span><span class="token function">info</span><span class="token punctuation">(</span><span class="token string">'Leload event fired!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

	KTApp<span class="token punctuation">.</span><span class="token function">block</span><span class="token punctuation">(</span>card<span class="token punctuation">.</span><span class="token function">getSelf</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">,</span> <span class="token punctuation">{</span>
		overlayColor<span class="token operator">:</span> <span class="token string">'#ffffff'</span><span class="token punctuation">,</span>
		type<span class="token operator">:</span> <span class="token string">'loader'</span><span class="token punctuation">,</span>
		state<span class="token operator">:</span> <span class="token string">'primary'</span><span class="token punctuation">,</span>
		opacity<span class="token operator">:</span> <span class="token number">0.3</span><span class="token punctuation">,</span>
		size<span class="token operator">:</span> <span class="token string">'lg'</span>
	<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

	<span class="token comment">// update the content here</span>

	<span class="token function">setTimeout</span><span class="token punctuation">(</span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
		KTApp<span class="token punctuation">.</span><span class="token function">unblock</span><span class="token punctuation">(</span>card<span class="token punctuation">.</span><span class="token function">getSelf</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
	<span class="token punctuation">}</span><span class="token punctuation">,</span> <span class="token number">2000</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre></div>                    </div>
                </div>
            </div>
        </div>
        <!--end: Code-->
        <!--end::Example-->

        <!--begin::Example-->
        <!--begin::Card-->
        <div class="card card-custom" data-card="true" data-card-tooltips="false" id="kt_card_2">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Card Tools</h3>
                </div>
				<div class="card-toolbar">
					<a href="#" class="btn btn-icon btn-sm btn-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Toggle Card">
						<i class="ki ki-arrow-down icon-nm"></i>
					</a>
                    <a href="#" class="btn btn-icon btn-sm btn-success mr-1" data-card-tool="reload" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reload Card">
						<i class="ki ki-reload icon-nm"></i>
					</a>
                    <a href="#" class="btn btn-icon btn-sm btn-warning" data-card-tool="remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Card">
						<i class="ki ki-close icon-nm"></i>
					</a>
				</div>
            </div>
            <div class="card-body">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled.
                </p>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled.
                </p>
            </div>
        </div>
        <!--end::Card-->

        <!--begin: Code-->
        <div class="example example-compact mt-2 gutter-b">
            <div class="example-tools">
                <span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
            </div>
            <div class="example-code">
                <ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#example_code_html_2">HTML</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#example_code_js_2">JS</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="example_code_html_2" role="tabpanel">
                        <div class="example-highlight"><pre style="height:300px" class=" language-html"><code class=" language-html"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>card card-custom<span class="token punctuation">"</span></span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>kt_card_2<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
	<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>card-header<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
		<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>card-title<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>card-label<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Card Title<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
		<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
		<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>card-toolbar<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>#<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>btn btn-icon btn-sm btn-primary mr-1<span class="token punctuation">"</span></span> <span class="token attr-name">data-card-tool</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>toggle<span class="token punctuation">"</span></span> <span class="token attr-name">data-toggle</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>tooltip<span class="token punctuation">"</span></span> <span class="token attr-name">data-placement</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>top<span class="token punctuation">"</span></span> <span class="token attr-name">title</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>Toggle Card<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>ki ki-arrow-down icon-nm<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>#<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>btn btn-icon btn-sm btn-success mr-1<span class="token punctuation">"</span></span> <span class="token attr-name">data-card-tool</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>reload<span class="token punctuation">"</span></span> <span class="token attr-name">data-toggle</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>tooltip<span class="token punctuation">"</span></span> <span class="token attr-name">data-placement</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>top<span class="token punctuation">"</span></span> <span class="token attr-name">title</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>Reload Card<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>ki ki-reload icon-nm<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>#<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>btn btn-icon btn-sm btn-warning<span class="token punctuation">"</span></span> <span class="token attr-name">data-card-tool</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>remove<span class="token punctuation">"</span></span> <span class="token attr-name">data-toggle</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>tooltip<span class="token punctuation">"</span></span> <span class="token attr-name">data-placement</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>top<span class="token punctuation">"</span></span> <span class="token attr-name">title</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>Remove Card<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>ki ki-close icon-nm<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
			<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span>
		<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
	<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
	<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>card-body<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
		...
	<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span></code></pre></div>                    </div>
                    <div class="tab-pane" id="example_code_js_2">
                        <div class="example-highlight"><pre style="height:300px" class=" language-js"><code class=" language-js"><span class="token comment">// This card is lazy initialized using data-card="true" attribute. You can access to the card object as shown below and override its behavior</span>
<span class="token keyword">var</span> card <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">KTCard</span><span class="token punctuation">(</span><span class="token string">'kt_card_1'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token comment">// Toggle event handlers</span>
card<span class="token punctuation">.</span><span class="token function">on</span><span class="token punctuation">(</span><span class="token string">'beforeCollapse'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token parameter">card</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
	<span class="token function">setTimeout</span><span class="token punctuation">(</span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
		toastr<span class="token punctuation">.</span><span class="token function">info</span><span class="token punctuation">(</span><span class="token string">'Before collapse event fired!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
	<span class="token punctuation">}</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

card<span class="token punctuation">.</span><span class="token function">on</span><span class="token punctuation">(</span><span class="token string">'afterCollapse'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token parameter">card</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
	<span class="token function">setTimeout</span><span class="token punctuation">(</span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
		toastr<span class="token punctuation">.</span><span class="token function">warning</span><span class="token punctuation">(</span><span class="token string">'Before collapse event fired!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
	<span class="token punctuation">}</span><span class="token punctuation">,</span> <span class="token number">2000</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

card<span class="token punctuation">.</span><span class="token function">on</span><span class="token punctuation">(</span><span class="token string">'beforeExpand'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token parameter">card</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
	<span class="token function">setTimeout</span><span class="token punctuation">(</span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
		toastr<span class="token punctuation">.</span><span class="token function">info</span><span class="token punctuation">(</span><span class="token string">'Before expand event fired!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
	<span class="token punctuation">}</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

card<span class="token punctuation">.</span><span class="token function">on</span><span class="token punctuation">(</span><span class="token string">'afterExpand'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token parameter">card</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
	<span class="token function">setTimeout</span><span class="token punctuation">(</span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
		toastr<span class="token punctuation">.</span><span class="token function">warning</span><span class="token punctuation">(</span><span class="token string">'After expand event fired!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
	<span class="token punctuation">}</span><span class="token punctuation">,</span> <span class="token number">2000</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token comment">// Remove event handlers</span>
card<span class="token punctuation">.</span><span class="token function">on</span><span class="token punctuation">(</span><span class="token string">'beforeRemove'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token parameter">card</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
	toastr<span class="token punctuation">.</span><span class="token function">info</span><span class="token punctuation">(</span><span class="token string">'Before remove event fired!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

	<span class="token keyword">return</span> <span class="token function">confirm</span><span class="token punctuation">(</span><span class="token string">'Are you sure to remove this card ?'</span><span class="token punctuation">)</span><span class="token punctuation">;</span> <span class="token comment">// remove card after user confirmation</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

card<span class="token punctuation">.</span><span class="token function">on</span><span class="token punctuation">(</span><span class="token string">'afterRemove'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token parameter">card</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
	<span class="token function">setTimeout</span><span class="token punctuation">(</span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
		toastr<span class="token punctuation">.</span><span class="token function">warning</span><span class="token punctuation">(</span><span class="token string">'After remove event fired!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
	<span class="token punctuation">}</span><span class="token punctuation">,</span> <span class="token number">2000</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token comment">// Reload event handlers</span>
card<span class="token punctuation">.</span><span class="token function">on</span><span class="token punctuation">(</span><span class="token string">'reload'</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token parameter">card</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
	toastr<span class="token punctuation">.</span><span class="token function">info</span><span class="token punctuation">(</span><span class="token string">'Leload event fired!'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

	KTApp<span class="token punctuation">.</span><span class="token function">block</span><span class="token punctuation">(</span>card<span class="token punctuation">.</span><span class="token function">getSelf</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">,</span> <span class="token punctuation">{</span>
		overlayColor<span class="token operator">:</span> <span class="token string">'#ffffff'</span><span class="token punctuation">,</span>
		type<span class="token operator">:</span> <span class="token string">'loader'</span><span class="token punctuation">,</span>
		state<span class="token operator">:</span> <span class="token string">'primary'</span><span class="token punctuation">,</span>
		opacity<span class="token operator">:</span> <span class="token number">0.3</span><span class="token punctuation">,</span>
		size<span class="token operator">:</span> <span class="token string">'lg'</span>
	<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

	<span class="token comment">// update the content here</span>

	<span class="token function">setTimeout</span><span class="token punctuation">(</span><span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
		KTApp<span class="token punctuation">.</span><span class="token function">unblock</span><span class="token punctuation">(</span>card<span class="token punctuation">.</span><span class="token function">getSelf</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
	<span class="token punctuation">}</span><span class="token punctuation">,</span> <span class="token number">2000</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre></div>                    </div>
                </div>
            </div>
        </div>
        <!--end: Code-->
        <!--end::Example-->
   	</div>
@endsection

@push('js')
<script type="text/javascript">
function SettingCurrentTime() {
  var currentTime = new Date();
  var hours = currentTime.getHours();
  var minutes = currentTime.getMinutes();
  var seconds = currentTime.getSeconds();
  var amOrPm = hours < 12 ? "AM" : "PM";
  hours = hours === 0 ? 12 : hours > 12 ? hours - 12 : hours;
  hours = addZero(hours);
  minutes = addZero(minutes);
  seconds = addZero(seconds);
  var currentDate = currentTime.getDate();
  var currentMonth = ConvertMonth(currentTime.getMonth());
  var currentYear = currentTime.getFullYear();
  var fullDateDisplay = `${currentDate} ${currentMonth} ${currentYear}`;
  document.getElementById("hours").innerText = hours;
  document.getElementById("minutes").innerText = minutes;
  document.getElementById("seconds").innerText = seconds;
  document.getElementById("amOrpm").innerText = amOrPm;
  document.getElementById("fullyear").innerText = fullDateDisplay;
  var timer = setTimeout(SettingCurrentTime, 1000);
}
function addZero(component) {
  return component < 10 ? "0" + component : component;
}
function ConvertMonth(component) {
  month_array = new Array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
  return month_array[component];
}
SettingCurrentTime();
</script>
@endpush
