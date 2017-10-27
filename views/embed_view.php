<div class="thumbnail">
    <div class="jumbotron">
        <div class="text-darkorange">
            <h4>[ <span class='fa fa-code'></span> ]</h4>
            <hr class="hr-darkorange">
            <span class="font-size-sm">add the following code to embed your chatbots to your website.</span><br><br>
            <div class="form-group">
                <textarea id="embedCode" class="form-control fixed-textarea font-size-sm" rows="3" readonly>
&lt;script id=&quot;window-script&quot; data-bind=&quot;<?php echo $botItem[0]['id']; ?>&quot; src=&quot;http://localhost/myapp-makemybot/public_html/js/window-script-min.js&quot;&gt;&lt;/script&gt;
                </textarea>
            </div>
            <div class="form-group text-right">
                <button onclick="copyAction('#embedCode')" type="button" class="btn btn-darkorange btn-lg min-width-lg">copy</button>
            </div>
        </div>
    </div>
</div>