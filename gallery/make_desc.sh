for n in pics/*; do touch descs/$(basename "${n%.*}").txt; done;
