[BITS 64]

section .data
	bit dq 64

section .text
	global _start

_start:
	mov rax,[bit]


