1.SELECT * FROM st2_activities ORDER BY fee DESC LIMIT 0, 3;
2.SELECT st2_members.name, st2_activities.name FROM st2_members JOIN st2_activities ON st2_members.st2_activity_id = st2_activities.id;
3.SELECT st2_members.name, st2_activities.name FROM st2_members LEFT JOIN st2_activities ON st2_members.st2_activity_id = st2_activities.id;
4.SELECT DISTINCT st2_activity_id FROM st2_members WHERE st2_activity_id IS NOT NULL ORDER BY st2_activity_id;
5.SELECT name FROM st2_activities WHERE id NOT IN (SELECT st2_activity_id FROM st2_members WHERE st2_activity_id IS NOT NULL ORDER BY st2_activity_id);
