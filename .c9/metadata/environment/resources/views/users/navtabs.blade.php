{"filter":false,"title":"navtabs.blade.php","tooltip":"/resources/views/users/navtabs.blade.php","undoManager":{"mark":6,"position":6,"stack":[[{"start":{"row":0,"column":0},"end":{"row":17,"column":17},"action":"insert","lines":[" <ul class=\"nav nav-tabs nav-justified mb-3\">","                {{-- 投稿タブ --}}","                <li class=\"nav-item\">","                    <a href=\"{{ route('users.show', ['user' => $user->id]) }}\" class=\"nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}\">","                        TimeLine","                        <span class=\"badge badge-secondary\">{{ $user->posts_count }}</span>","                    </a>","                </li>","                {{-- Diaryタブ --}}","                <li class=\"nav-item\"><a href=\"Diary.Diary\" class=\"nav-link\">Diary</a></li>","                ","                {{-- Wordsタブ --}}","                <li class=\"nav-item\">","                    <a href=\"{{ route('words.index', ['user' => $user->id]) }}\" class=\"nav-link {{ Request::routeIs('words.show') ? 'active' : '' }}\">","                        Words","                        </a>","                        </li>","            </ul>"],"id":1}],[{"start":{"row":4,"column":24},"end":{"row":4,"column":32},"action":"remove","lines":["TimeLine"],"id":2}],[{"start":{"row":4,"column":24},"end":{"row":4,"column":25},"action":"insert","lines":["P"],"id":3},{"start":{"row":4,"column":25},"end":{"row":4,"column":26},"action":"insert","lines":["o"]},{"start":{"row":4,"column":26},"end":{"row":4,"column":27},"action":"insert","lines":["s"]},{"start":{"row":4,"column":27},"end":{"row":4,"column":28},"action":"insert","lines":["t"]},{"start":{"row":4,"column":28},"end":{"row":4,"column":29},"action":"insert","lines":["s"]}],[{"start":{"row":3,"column":45},"end":{"row":3,"column":49},"action":"remove","lines":["show"],"id":4},{"start":{"row":3,"column":45},"end":{"row":3,"column":46},"action":"insert","lines":["i"]},{"start":{"row":3,"column":46},"end":{"row":3,"column":47},"action":"insert","lines":["n"]},{"start":{"row":3,"column":47},"end":{"row":3,"column":48},"action":"insert","lines":["d"]},{"start":{"row":3,"column":48},"end":{"row":3,"column":49},"action":"insert","lines":["e"]},{"start":{"row":3,"column":49},"end":{"row":3,"column":50},"action":"insert","lines":["x"]}],[{"start":{"row":3,"column":39},"end":{"row":3,"column":44},"action":"remove","lines":["users"],"id":5},{"start":{"row":3,"column":39},"end":{"row":3,"column":40},"action":"insert","lines":["p"]},{"start":{"row":3,"column":40},"end":{"row":3,"column":41},"action":"insert","lines":["o"]},{"start":{"row":3,"column":41},"end":{"row":3,"column":42},"action":"insert","lines":["s"]},{"start":{"row":3,"column":42},"end":{"row":3,"column":43},"action":"insert","lines":["t"]},{"start":{"row":3,"column":43},"end":{"row":3,"column":44},"action":"insert","lines":["s"]}],[{"start":{"row":3,"column":117},"end":{"row":3,"column":122},"action":"remove","lines":["users"],"id":6},{"start":{"row":3,"column":117},"end":{"row":3,"column":118},"action":"insert","lines":["p"]},{"start":{"row":3,"column":118},"end":{"row":3,"column":119},"action":"insert","lines":["o"]},{"start":{"row":3,"column":119},"end":{"row":3,"column":120},"action":"insert","lines":["s"]},{"start":{"row":3,"column":120},"end":{"row":3,"column":121},"action":"insert","lines":["t"]}],[{"start":{"row":3,"column":121},"end":{"row":3,"column":122},"action":"insert","lines":["s"],"id":7}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":4,"column":20},"end":{"row":4,"column":20},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1602912755817,"hash":"2c1ac5bc8f5eab303fe990dcfffcad980ee0d49c"}