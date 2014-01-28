# Как проводить встречи для подписи ключей GnuPG

Этот документ описывает организацию и проведение встречи для подписи ключей PGP с использованием реализации GNU, GnuPG. Он так же объясняет процесс подписи ключей, дает ответы на часто задаваемые вопросы и поясняет, как создать собственную пару ключей и как подписывать ключи других людей.

V. Alex Brennen (vab@cryptnet.net)<br />
Перевод на русский: Vladimir Ivanov (ivlad@malpaso.ru)<br />
Версия 1.1.0, 26 Ноября 2003 года.

## Оглавление
#### 1. [Описание встречи](#1)
* 1.1 [Что такое «встреча для подписи ключей?»](#1.1)
* 1.2 [Что такое «подпись ключей?»](#1.2)
* 1.3 [Что такое сеть доверия?](#1.3)

### 1. Описание встречи <span id="1" />

#### 1.1 Что такое «встреча для подписи ключей?» <span id="1.1" />
Встреча для подписи ключей&nbsp;— это собрание людей, которые используют систему шифрования PGP, для подписи ключей друг друга. Встречи для подписи ключей позволяют значительно расширить сеть доверия. Кроме того, встречи для подписи ключей предоставляют замечательную возможность обсудить различные общественные и политические проблемы, возникающие в связи с применением сильной криптографии, вопросы свободы личности, личной неприкосновенности или просто возможность поболтать, а, может быть, даже придумать новые механизмы шифрования.

#### 1.2 Что такое «подпись ключей?» <span id="1.2" />
Подпись ключей&nbsp;— это процесс электронной подписи открытого ключа и соответствующего ему идентификатора личности. Процесс подписи ключа позволяет убедиться, что открытый ключ и идентификатор пользователя действительно принадлежат владельцу открытого ключа и соответствующего идентификатора.

Можно подписывать как собственные открытые ключи, так и открытые ключ и идентификаторы других пользователей.

Смысл подписи ключей состоит в подтверждении третьим лицом принадлежности открытого ключа и соответствующего идентификаторa. Таким образом, подпись ключей позволяет создать сеть доверия.

#### 1.3 Что такое сеть доверия? <span id="1.3" />
Термин «сеть доверия» используется для описания отношений доверия между несколькими ключами (точнее — их владельцами). Ключи представляют собой узлы графа доверия, а подписи — ребра графа. Эти связи между ключами так же называются пути доверия. Доверие может быть как двухсторонним, так и односторонним. В идеальной сети доверия каждый доверяет каждому. Это означает, что каждый уверен, что все ключи принадлежат своим владельцам. Сеть доверия может рассматриваться как сумма всех путей доверия между всеми владельцами ключей. Вот пример сети доверия, которой я принадлежу.