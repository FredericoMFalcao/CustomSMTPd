all:
	pdflatex main.tex
	pdflatex main.tex
	[  -f main.out ] && rm main.out || echo
	[  -f main.log ] && rm main.log || echo
	[  -f main.aux ] && rm main.aux || echo
	[  -f main.toc ] && rm main.toc || echo
	firefox main.pdf
