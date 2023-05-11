import string
import random

alphabet = list(string.ascii_lowercase)

def create_id_car(nb_cars,nb_modele):
    id_cars = []
    for i in range(nb_cars):
        first_nb = random.randint(1,999)
        last_nb = random.randint(1,999)
        letters = random.choice(alphabet) + random.choice(alphabet) + random.choice(alphabet)
        while (first_nb,last_nb,letters) in id_cars:
            first_nb = random.randint(1,999)
            last_nb = random.randint(1,999)
            letters = random.choice(alphabet) + random.choice(alphabet) + random.choice(alphabet)
        id_cars.append((first_nb,last_nb,letters))
        letters = letters.upper()
        km = random.randint(1,9999)
        print(f"('{'{:03d}'.format(first_nb)} {letters} {'{:03d}'.format(last_nb)}', {km}, {(i%nb_modele)+1}),")

create_id_car(32,26)

