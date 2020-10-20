 <ul class="nav nav-tabs nav-justified mb-3">
                {{-- 投稿タブ --}}
                <li class="nav-item">
                    <a href="{{ route('posts.index', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('posts.show') ? 'active' : '' }}">
                        Posts
                        <span class="badge badge-secondary">{{ $user->posts_count }}</span>
                    </a>
                </li>
                {{-- Diaryタブ --}}
                <li class="nav-item"><a href="Diary.Diary" class="nav-link">Diary</a></li>
                
                {{-- Wordsタブ --}}
                <li class="nav-item">
                    <a href="{{ route('words.index', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('words.show') ? 'active' : '' }}">
                        Words
                        </a>
                        </li>
            </ul>