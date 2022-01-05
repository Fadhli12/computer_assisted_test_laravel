<!--------------------
              START - Color Scheme Toggler
              -------------------->
<div class="floated-colors-btn second-floated-btn">
    <div class="os-toggler-w">
        <div class="os-toggler-i">
            <div class="os-toggler-pill"></div>
        </div>
    </div>
    <span>Dark </span><span>Colors</span>
</div>
<!--------------------
END - Color Scheme Toggler
--------------------><!--------------------
              START - Demo Customizer
              -------------------->
<div class="floated-customizer-btn
{{--third-floated-btn--}}
">
    <div class="icon-w">
        <i class="os-icon os-icon-ui-46"></i>
    </div>
    <span>Customizer</span>
</div>
<div class="floated-customizer-panel" style="right: 0!important;">
    <div class="fcp-content">
        <div class="close-customizer-btn">
            <i class="os-icon os-icon-x"></i>
        </div>
        <div class="fcp-group">
            <div class="fcp-group-header">
                Menu Settings
            </div>
            <div class="fcp-group-contents">
                <div class="fcp-field">
                    <label for="">Menu Position</label>
                    <select class="menu-position-selector">
                        <option value="left">
                            Left
                        </option>
                        <option value="right">
                            Right
                        </option>
                        <option value="top">
                            Top
                        </option>
                    </select>
                </div>
                <div class="fcp-field">
                    <label for="">Menu Style</label>
                    <select class="menu-layout-selector">
                        <option value="compact">
                            Compact
                        </option>
                        <option value="full">
                            Full
                        </option>
                        <option value="mini">
                            Mini
                        </option>
                    </select>
                </div>
                <div class="fcp-field with-image-selector-w">
                    <label for="">With Image</label>
                    <select class="with-image-selector">
                        <option value="yes">
                            Yes
                        </option>
                        <option value="no">
                            No
                        </option>
                    </select>
                </div>
                <div class="fcp-field">
                    <label for="">Menu Color</label>
                    <div class="fcp-colors menu-color-selector">
                        <div class="color-selector menu-color-selector color-bright selected"></div>
                        <div class="color-selector menu-color-selector color-dark"></div>
                        <div class="color-selector menu-color-selector color-light"></div>
                        <div class="color-selector menu-color-selector color-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fcp-group">
            <div class="fcp-group-header">
                Sub Menu
            </div>
            <div class="fcp-group-contents">
                <div class="fcp-field">
                    <label for="">Sub Menu Style</label>
                    <select class="sub-menu-style-selector">
                        <option value="flyout">
                            Flyout
                        </option>
                        <option value="inside">
                            Inside/Click
                        </option>
                        <option value="over">
                            Over
                        </option>
                    </select>
                </div>
                <div class="fcp-field">
                    <label for="">Sub Menu Color</label>
                    <div class="fcp-colors">
                        <div class="color-selector sub-menu-color-selector color-bright selected"></div>
                        <div class="color-selector sub-menu-color-selector color-dark"></div>
                        <div class="color-selector sub-menu-color-selector color-light"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fcp-group">
            <div class="fcp-group-header">
                Other Settings
            </div>
            <div class="fcp-group-contents">
                <div class="fcp-field">
                    <label for="">Full Screen?</label>
                    <select class="full-screen-selector">
                        <option value="yes">
                            Yes
                        </option>
                        <option value="no">
                            No
                        </option>
                    </select>
                </div>
                <div class="fcp-field">
                    <label for="">Show Top Bar</label>
                    <select class="top-bar-visibility-selector">
                        <option value="yes">
                            Yes
                        </option>
                        <option value="no">
                            No
                        </option>
                    </select>
                </div>
                <div class="fcp-field">
                    <label for="">Above Menu?</label>
                    <select class="top-bar-above-menu-selector">
                        <option value="yes">
                            Yes
                        </option>
                        <option value="no">
                            No
                        </option>
                    </select>
                </div>
                <div class="fcp-field">
                    <label for="">Top Bar Color</label>
                    <div class="fcp-colors">
                        <div class="color-selector top-bar-color-selector color-bright selected"></div>
                        <div class="color-selector top-bar-color-selector color-dark"></div>
                        <div class="color-selector top-bar-color-selector color-light"></div>
                        <div class="color-selector top-bar-color-selector color-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--------------------
END - Demo Customizer
-------------------->
@if (false)
<!--------------------
              START - Chat Popup Box
              -------------------->
<div class="floated-chat-btn">
    <i class="os-icon os-icon-mail-07"></i><span>Demo Chat</span>
</div>
<div class="floated-chat-w">
    <div class="floated-chat-i">
        <div class="chat-close">
            <i class="os-icon os-icon-close"></i>
        </div>
        <div class="chat-head">
            <div class="user-w with-status status-green">
                <div class="user-avatar-w">
                    <div class="user-avatar">
                        <img alt="" src="{{asset('assets')}}/img/avatar8.png" />
                    </div>
                </div>
                <div class="user-name">
                    <h6 class="user-title">
                        John Mayers
                    </h6>
                    <div class="user-role">
                        Account Manager
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-messages">
            <div class="message">
                <div class="message-content">
                    Hi, how can I help you?
                </div>
            </div>
            <div class="date-break">
                Mon 10:20am
            </div>
            <div class="message">
                <div class="message-content">
                    Hi, my name is Mike, I will be happy to assist you
                </div>
            </div>
            <div class="message self">
                <div class="message-content">
                    Hi, I tried ordering this product and it keeps showing me error code.
                </div>
            </div>
        </div>
        <div class="chat-controls">
            <input class="message-input" placeholder="Type your message here..." type="text" />
            <div class="chat-extra">
                <a href="#"><span class="extra-tooltip">Attach Document</span><i class="os-icon os-icon-documents-07"></i></a><a href="#"><span class="extra-tooltip">Insert Photo</span><i class="os-icon os-icon-others-29"></i></a><a href="#"><span class="extra-tooltip">Upload Video</span><i class="os-icon os-icon-ui-51"></i></a>
            </div>
        </div>
    </div>
</div>
@endif
@push('add-script')
    <script>
        $(document).ready(function (){
            $('.menu-position-selector').change(function () {
                localStorage.setItem('menu-position-selector', $(this).val());
            })
            $('.menu-layout-selector').change(function () {
                localStorage.setItem('menu-layout-selector', $(this).val());
            })
            $('.with-image-selector').change(function () {
                localStorage.setItem('with-image-selector', $(this).val());
            })
            $('.menu-color-selector').click(function (){
                if ($(this).hasClass('color-bright')){
                    localStorage.setItem('menu-color-selector','color-bright')
                } else if ($(this).hasClass('color-dark')){
                    localStorage.setItem('menu-color-selector','color-dark')
                } else if ($(this).hasClass('color-light')){
                    localStorage.setItem('menu-color-selector','color-light')
                } else if ($(this).hasClass('color-transparent')){
                    localStorage.setItem('menu-color-selector','color-transparent')
                }
            })
            $('.sub-menu-style-selector').change(function () {
                localStorage.setItem('sub-menu-style-selector', $(this).val());
            })
            $('.sub-menu-color-selector').click(function (){
                if ($(this).hasClass('color-bright')){
                    localStorage.setItem('sub-menu-color-selector','color-bright')
                } else if ($(this).hasClass('color-dark')){
                    localStorage.setItem('sub-menu-color-selector','color-dark')
                } else if ($(this).hasClass('color-light')){
                    localStorage.setItem('sub-menu-color-selector','color-light')
                }
            })
            $('.full-screen-selector').change(function () {
                localStorage.setItem('full-screen-selector', $(this).val());
            })
            $('.top-bar-visibility-selector').change(function () {
                localStorage.setItem('top-bar-visibility-selector', $(this).val());
            })
            $('.top-bar-above-menu-selector').change(function () {
                localStorage.setItem('top-bar-above-menu-selector', $(this).val());
            })
            $('.top-bar-color-selector').click(function (){
                if ($(this).hasClass('color-bright')){
                    localStorage.setItem('top-bar-color-selector','color-bright')
                } else if ($(this).hasClass('color-dark')){
                    localStorage.setItem('top-bar-color-selector','color-dark')
                } else if ($(this).hasClass('color-light')){
                    localStorage.setItem('top-bar-color-selector','color-light')
                } else if ($(this).hasClass('color-transparent')){
                    localStorage.setItem('top-bar-color-selector','color-transparent')
                }
            })
        })
    </script>
@endpush
<!--------------------
END - Chat Popup Box
-------------------->
