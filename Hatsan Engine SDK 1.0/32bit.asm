[BITS 32]

section .data
	bit dd 32

section .text
	global _start

_start:
	mov ax,[bit]


