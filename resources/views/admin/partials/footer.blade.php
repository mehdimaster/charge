<footer class="main-footer sticky footer-type-1">

    <div class="footer-inner">

        <!-- Add your copyright text here -->
        <div class="footer-text">
            &copy; 2014
            <strong>Xenon</strong>
            theme by <a href="http://laborator.co" target="_blank">Laborator</a>
        </div>


        <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
        <div class="go-up">

            <a href="#" rel="go-top">
                <i class="fa-angle-up"></i>
            </a>

        </div>

    </div>

</footer>
</div>


<!-- start: Chat Section -->
<div id="chat" class="fixed">

    <div class="chat-inner">


        <h2 class="chat-header">
            <a href="#" class="chat-close" data-toggle="chat">
                <i class="fa-plus-circle rotate-45deg"></i>
            </a>

            Chat
            <span class="badge badge-success is-hidden">0</span>
        </h2>

        <script type="text/javascript">
            // Here is just a sample how to open chat conversation box
            jQuery(document).ready(function($)
            {
                var $chat_conversation = $(".chat-conversation");

                $(".chat-group a").on('click', function(ev)
                {
                    ev.preventDefault();

                    $chat_conversation.toggleClass('is-open');

                    $(".chat-conversation textarea").trigger('autosize.resize').focus();
                });

                $(".conversation-close").on('click', function(ev)
                {
                    ev.preventDefault();
                    $chat_conversation.removeClass('is-open');
                });
            });
        </script>


        <div class="chat-group">
            <strong>Favorites</strong>

            <a href="#"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
            <a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
            <a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
            <a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
            <a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
        </div>


        <div class="chat-group">
            <strong>Work</strong>

            <a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
            <a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
            <a href="#"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
        </div>


        <div class="chat-group">
            <strong>Other</strong>

            <a href="#"><span class="user-status is-online"></span> <em>Dennis E. Johnson</em></a>
            <a href="#"><span class="user-status is-online"></span> <em>Stuart A. Shire</em></a>
            <a href="#"><span class="user-status is-online"></span> <em>Janet I. Matas</em></a>
            <a href="#"><span class="user-status is-online"></span> <em>Mindy A. Smith</em></a>
            <a href="#"><span class="user-status is-busy"></span> <em>Herman S. Foltz</em></a>
            <a href="#"><span class="user-status is-busy"></span> <em>Gregory E. Robie</em></a>
            <a href="#"><span class="user-status is-busy"></span> <em>Nellie T. Foreman</em></a>
            <a href="#"><span class="user-status is-busy"></span> <em>William R. Miller</em></a>
            <a href="#"><span class="user-status is-idle"></span> <em>Vivian J. Hall</em></a>
            <a href="#"><span class="user-status is-offline"></span> <em>Melinda A. Anderson</em></a>
            <a href="#"><span class="user-status is-offline"></span> <em>Gary M. Mooneyham</em></a>
            <a href="#"><span class="user-status is-offline"></span> <em>Robert C. Medina</em></a>
            <a href="#"><span class="user-status is-offline"></span> <em>Dylan C. Bernal</em></a>
            <a href="#"><span class="user-status is-offline"></span> <em>Marc P. Sanborn</em></a>
            <a href="#"><span class="user-status is-offline"></span> <em>Kenneth M. Rochester</em></a>
            <a href="#"><span class="user-status is-offline"></span> <em>Rachael D. Carpenter</em></a>
        </div>

    </div>

    <!-- conversation template -->
    <div class="chat-conversation">

        <div class="conversation-header">
            <a href="#" class="conversation-close">
                &times;
            </a>

            <span class="user-status is-online"></span>
            <span class="display-name">Arlind Nushi</span>
            <small>Online</small>
        </div>

        <ul class="conversation-body">
            <li>
                <span class="user">Arlind Nushi</span>
                <span class="time">09:00</span>
                <p>Are you here?</p>
            </li>
            <li class="odd">
                <span class="user">Brandon S. Young</span>
                <span class="time">09:25</span>
                <p>This message is pre-queued.</p>
            </li>
            <li>
                <span class="user">Brandon S. Young</span>
                <span class="time">09:26</span>
                <p>Whohoo!</p>
            </li>
            <li class="odd">
                <span class="user">Arlind Nushi</span>
                <span class="time">09:27</span>
                <p>Do you like it?</p>
            </li>
        </ul>

        <div class="chat-textarea">
            <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
        </div>

    </div>

</div>
<!-- end: Chat Section -->


</div>


<div class="page-loading-overlay">
    <div class="loader-2"></div>
</div>




<!-- Bottom Scripts -->
<script  type="text/javascript" src='{{staticAsset("assets/js/bootstrap.min.js")}}'></script>
<script  type="text/javascript" src='{{staticAsset("assets/js/admin/TweenMax.min.js")}}'></script>
<script  type="text/javascript" src='{{staticAsset("assets/js/admin/joinable.js")}}'></script>
<script  type="text/javascript" src='{{staticAsset("assets/js/admin/xenon-api.js")}}'></script>
<script  type="text/javascript" src='{{staticAsset("assets/js/admin/xenon-toggles.js")}}'></script>
<script  type="text/javascript" src='{{staticAsset("assets/js/admin/xenon-widgets.js")}}'></script>
<script  type="text/javascript" src='{{staticAsset("assets/js/admin/resizeable.js")}}'></script>
<script  type="text/javascript" src='{{staticAsset("assets/js/admin/devexpress-web-14.1/js/globalize.min.js")}}'></script>
<script  type="text/javascript" src='{{staticAsset("assets/js/admin/devexpress-web-14.1/js/dx.chartjs.js")}}'></script>
<script  type="text/javascript" src='{{staticAsset("assets/js/admin/toastr.min.js")}}'></script>
<script  type="text/javascript" src='{{staticAsset("assets/js/admin/xenon-custom.js")}}'></script>



</body>
</html>