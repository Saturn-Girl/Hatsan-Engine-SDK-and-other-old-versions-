[BITS 32]

section .data
	hp dd 5

section .text
	global _start

_start:
	mov eax,[hp]

