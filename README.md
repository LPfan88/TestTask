###SQL dummy test
#### Вопрос 1
Выбрать всех людей, которые хоть раз путешествовали и отобразить около каждого список мест, где он бывал через запятую.
Колонки: name, distinations

Ответ:
```sql
SELECT human.name,

  (SELECT GROUP_CONCAT(vacation_dist.name)
   FROM vacation_dist
   WHERE id IN
       (SELECT human_vacation_dist.distination_id
        FROM human_vacation_dist
        WHERE human_vacation_dist.human_id = human.id)) AS destination
FROM human
WHERE EXISTS
    (SELECT *
     FROM human_vacation_dist
     WHERE human_id = human.id)
```

#### Вопрос 2
Выбрать всех людей, которые были и на Кубе и в Сочи.
Колонки: name

Ответ:
```sql
SELECT human.name
FROM human
JOIN
  (SELECT human_vacation_dist.human_id
   FROM human_vacation_dist
   WHERE distination_id IN (1,
                            3)
   GROUP BY human_vacation_dist.human_id
   HAVING COUNT(*) = 2) a ON a.human_id = human.id
```

#### Вопрос 3
Выбрать всех людей, которые были только и на Кубе и в Сочи.
Колонки: name

Ответ:
```sql
SELECT human.name
FROM human
JOIN
  (SELECT human_vacation_dist.human_id
   FROM human_vacation_dist
   GROUP BY human_vacation_dist.human_id
   HAVING COUNT(DISTINCT IF(human_vacation_dist.distination_id IN (1,3),human_vacation_dist.distination_id,NULL)) = 2
   AND COUNT(DISTINCT human_vacation_dist.distination_id) = 2) a ON a.human_id = human.id
```

###PHP dummy test
#### Вопрос 1

Написать простой CLI скрипт, который принимает *на ввод* строку, переворачивает ее и удаляет все гласные и выводит на экран.

Пример:
input: Hello world!
output: !dlrw llH

Ответ: 
```
./index.php 'Hello world!'
```

#### Вопрос 2
Покройте класс/функцию, написанную для предыдущего задания тестами, используя phpunit framework.

Ответ:
```
vendor/bin/phpunit Test.php --bootstrap vendor/autoload.php
```
