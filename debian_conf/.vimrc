syntax enable
syntax on
set t_Co=256
colorscheme solarized 
set number
set autoindent
set smartindent
set tabstop=4
set showmatch
set incsearch
set guifont=consolas:18
inoremap ( ()<LEFT>
inoremap [ []<LEFT>
"inoremap { {}<LEFT>
set ai!
set fileencodings=utf-8,gb2312,gbk,gb18030
set termencoding=utf-8
"set fileformats=unix
"set encoding=prc
" color
if $TERM =~ '^xterm' || $TERM =~ '^screen' || $TERM=~ '256color$'
"set t_Co=256
set background=dark
let g:solarized_termcolors = 256
colorscheme solarized 
elseif has('gui_running')
set background=light
let g:solarized_termcolors = 256
colorscheme solarized 
elseif $TERM =~ 'cons25'
colorscheme default
endif
