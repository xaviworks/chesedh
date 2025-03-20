DList = {
    'IT': [(88.3, 'Yu'), (93.2, 'Lim'), (91.5, 'Tan')],
    'BA': [(90.1, 'Ang'), (95.7, 'Reyes')],
    'Psy': [(92.5, 'Lee'), (94.2, 'Ford'), (89.4, 'Chan')],
    'Edu': [(92.8, 'Go')]
}

all_students = sum(DList.values(), [])

for program, students in DList.items():
    print(f"{len(students)} DLs in the {program} program")
    for wpa, lastname in sorted(students, reverse=True):
        print(f"[{wpa}, '{lastname}']")
    print()

print("List of Deans Lister sorted by WPA")
print("WPA    Lastname")
for wpa, lastname in sorted(all_students, reverse=True):
    print(f"{wpa:<6} {lastname}")
print()

print("List of Deans Lister sorted by name")
print("WPA    Lastname")
for wpa, lastname in sorted(all_students, key=lambda x: x[1]):
    print(f"{wpa:<6} {lastname}")
print()
